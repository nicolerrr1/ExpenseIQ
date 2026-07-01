<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index(ReportService $reportService)
    {
        $report = $reportService->getMonthlyReport(
            Auth::id(),
            now()->month,
            now()->year
        );

        return view('reports.index', compact('report'));
    }
}