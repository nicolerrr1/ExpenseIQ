<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ExportController extends Controller
{
    public function csv(ReportService $reportService): StreamedResponse
    {
        $report = $reportService->getMonthlyReport(
            Auth::id(),
            now()->month,
            now()->year
        );

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="expense-report.csv"',
        ];

        $callback = function () use ($report) {

            $file = fopen('php://output', 'w');

            fputcsv($file, [
                'Category',
                'Description',
                'Amount',
                'Date'
            ]);

            foreach ($report['expenses'] as $expense) {

                fputcsv($file, [

                    $expense->category->category_name,

                    $expense->description,

                    $expense->amount,

                    $expense->expense_date,

                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}