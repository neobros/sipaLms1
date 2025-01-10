<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Result;
use DB;


class ReportController extends Controller
{

    public function studentReport(Request $request)
    {
        $teacherId = Auth::guard('teacher')->user()->Teacher_ID;

        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d'));

        $studentsByDate = \App\Models\Reservation::where('Teacher_ID', $teacherId)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count') 
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
                    'name' => 'Student Registrations',
                    'data' => $dateRange->map(fn ($date) => $studentsByDate->firstWhere('date', $date)?->count ?? 0),
                ],
            ],
        ];

        return view('teacher.reportsManagement.studentReport', compact('chartData', 'startDate', 'endDate'));
    }

    
    public function incomeReport(Request $request)
    {
        $teacherId = Auth::guard('teacher')->user()->Teacher_ID;

        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d'));

        $incomeByDate = \App\Models\Payment::join('reservation', 'payment.Reservation_ID', '=', 'reservation.Reservation_ID')
            ->where('reservation.Teacher_ID', $teacherId) // Filter by the logged-in teacher's ID
            ->whereBetween('payment.created_at', [$startDate, $endDate]) // Filter by date range
            ->selectRaw('DATE(payment.created_at) as date, SUM(payment.amount) as total_income')
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

        return view('teacher.reportsManagement.incomeReport', compact('chartData', 'startDate', 'endDate'));
    }

    public function parentReport()
    {
        // dd("test");
        $SubjectList = DB::table('subject')->select('subj_stream')
        ->distinct()->get();

        return view('parent.email_form')->with(['SubjectList'  =>  $SubjectList,]);
    }

    public function parentReportView(Request $request)
    {
        $request->validate([
            'parent_email' => 'required|email',
        ]);

        $parentEmail = $request->input('parent_email');

        $students = Student::where('parent_email', $parentEmail)->get();

        if ($students->isEmpty()) {
            return view('parent.results', ['error' => 'No students found for the provided email.']);
        }

        $studentIds = $students->pluck('stu_ID');
        
        $results = DB::table('results')
            ->join('quizzes', 'results.quizzes_ID', '=', 'quizzes.id') 
            ->whereIn('results.stu_ID', $studentIds)
            ->select('results.*', 'quizzes.title as quiz_title')
            ->get();
            
        $SubjectList = DB::table('subject')->select('subj_stream')
        ->distinct()->get();

        return view('parent.student_results', [
            'students' => $students,
            'results' => $results,
            'parentEmail' => $parentEmail,
            'SubjectList'  =>  $SubjectList,
        ]);
    }
}
