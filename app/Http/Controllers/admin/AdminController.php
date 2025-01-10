<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function admin_login()
    {
        return view('admin/admin_login');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard')->with('success', 'Login Successfully.');
        }
        return redirect()->back()->with('delete',  'These credentials do not match our records!');

    }

    public function dashboard()
    {
        $teacherCount = DB::table('teacher')
            ->join('subject', 'teacher.Teach_stream', '=', 'subject.subj_ID')
            ->where('Status', 1)
            ->count();
        $subjectCount = DB::table('subject')->count();
        $classCount = DB::table('class_detail')->count();
        $studentCount = DB::table('student')->count();

        $startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $endDate = Carbon::now()->format('Y-m-d');

        $incomeByDate = DB::table('payment')
            ->selectRaw('DATE(created_at) as date, SUM(amount) as total_income')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dateRange = collect();
        $currentDate = Carbon::parse($startDate);

        while ($currentDate->lte(Carbon::parse($endDate))) {
            $dateRange->push($currentDate->format('Y-m-d'));
            $currentDate->addDay();
        }

        $chartData = [
            'categories' => $dateRange,
            'series' => [
                [
                    'name' => 'Daily Income',
                    'data' => $dateRange->map(fn ($date) => $incomeByDate->firstWhere('date', $date)?->total_income ?? 0),
                ],
            ],
        ];

        return view('admin.dashboard')->with([
            'teacherCount' => $teacherCount,
            'subjectCount' => $subjectCount,
            'classCount' => $classCount,
            'studentCount' => $studentCount,
            'chartData' => $chartData,
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        // Optionally invalidate the session
        request()->session()->invalidate();

        // Regenerate session token to prevent session fixation attacks
        request()->session()->regenerateToken();

        // Redirect to the homepage or login page
        return redirect('/admin/login')->with('success', 'Successfully logged out');
    }
}
