<?php

namespace App\Services;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Expense;
use Carbon\Carbon;

class ReportService
{
    public function getMonthlyReport(
        int $userId, 
        int $month, 
        int $year,
        $category = 'all'
    ): array
    {

        // | Current Month Expenses

        $expenses = Expense::with('category')
            ->where('user_id', $userId)
            ->whereMonth('expense_date', $month)
            ->whereYear('expense_date', $year)
            ->get();

        $totalExpenses = $expenses->sum('amount');
        
        // | Current Month Budget
        $budget = Budget::where('user_id', $userId)
            ->where('month', $month)
            ->where('year', $year)
            ->get();

        $totalBudget = $budget->sum('budget_amount');

        // | Yearly Monthly Totals
        $monthlyTotals = [];

        for ($m = 1; $m <= 12; $m++) {

        $query = Expense::where('user_id', $userId)
            ->whereYear('expense_date', $year)
            ->whereMonth('expense_date', $m);

        if ($category != 'all') {
            $query->where('category_id', $category);
        }

        $monthlyTotals[$m] = $query->sum('amount');
    }

        // | Summary Cards

        $averageMonthly = collect($monthlyTotals)->average();
        $highestMonthAmount = max($monthlyTotals);

        $highestMonthNumber = array_search(
            $highestMonthAmount,
            $monthlyTotals
        );

        $bestMonth = $highestMonthAmount > 0
            ? Carbon::create()->month($highestMonthNumber)->format('F')
            : '-';

        $yearTotal = array_sum($monthlyTotals);

        // | Chart Data

        $chartLabels = [];
        $chartData = [];

        foreach ($monthlyTotals as $monthNumber => $amount) {
            $chartLabels[] = Carbon::create()
                ->month($monthNumber)
                ->format('M');

            $chartData[] = $amount;
        }

        // | Top Categories

        $categorySummary = $expenses
            ->groupBy(fn ($expense) => $expense->category->category_name)
            ->map(fn ($items) => $items->sum('amount'))
            ->sortDesc();

        $highestCategory = $categorySummary->max();
        $topCategories = [];

        foreach ($categorySummary as $name => $amount) {

            $topCategories[] = [

                'name' => $name,
                'amount' => $amount,
                'percentage' => $highestCategory > 0
                    ? round(($amount / $highestCategory) * 100)
                    : 0,
            ];
        }

        //  Month Comparison
        $monthComparison = [];

        for ($i = $month - 1; $i >= max(1, $month - 3); $i--) {
            $previous = $monthlyTotals[$i];
            $current = $monthlyTotals[$month];
            $change = $previous > 0
                ? round((($current - $previous) / $previous) * 100, 1)
                : 0;

            $monthComparison[] = [
                'month' => Carbon::create()
                    ->month($i)
                    ->format('F'),

                'amount' => $previous,
                'change' => $change,
            ];
        }
        return [

            'totalBudget' => $totalBudget,
            'totalExpenses' => $totalExpenses,
            'remainingBudget' => max($totalBudget - $totalExpenses, 0),
            'categorySummary' => $categorySummary,
            'expenses' => $expenses,
 
            //  Summary Cards
            'averageMonthly' => $averageMonthly,
            'bestMonth' => $bestMonth,
            'highestMonthAmount' => $highestMonthAmount,
            'yearTotal' => $yearTotal,

            // Chart
            'chartLabels' => $chartLabels,
            'chartData' => $chartData,

            //  Categories
            'topCategories' => $topCategories,

            //  Month Comparison
            'monthComparison' => $monthComparison,

        ];
    }
}