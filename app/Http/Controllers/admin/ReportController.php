<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function teacherReport(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d'));

        $teachersByDate = \App\Models\Teacher::whereBetween('created_at', [$startDate, $endDate])
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
                    'name' => 'Teacher Registrations',
                    'data' => $dateRange->map(fn ($date) => $teachersByDate->firstWhere('date', $date)?->count ?? 0),
                ],
            ],
        ];

        return view('admin.reportsManagement.teacherReport', compact('chartData', 'startDate', 'endDate'));
    }
    

    public function studentReport(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d'));

        $studentsByDate = \App\Models\Student::whereBetween('created_at', [$startDate, $endDate])
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

        return view('admin.reportsManagement.studentReport', compact('chartData', 'startDate', 'endDate'));
    }


    public function incomeReport(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
        $endDate = $request->input('end_date', Carbon::now()->format('Y-m-d'));

        $incomeByDate = \App\Models\Payment::whereBetween('created_at', [$startDate, $endDate])
            ->selectRaw('DATE(created_at) as date, SUM(amount) as total_income')
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

        return view('admin.reportsManagement.incomeReport', compact('chartData', 'startDate', 'endDate'));
    }

}
