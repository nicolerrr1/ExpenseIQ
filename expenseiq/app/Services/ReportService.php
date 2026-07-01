<?php

namespace App\Services;

use App\Models\Budget;
use App\Models\Expense;

class ReportService
{
    public function getMonthlyReport(int $userId, int $month, int $year): array
    {
        $expenses = Expense::with('category')
            ->where('user_id', $userId)
            ->whereMonth('expense_date', $month)
            ->whereYear('expense_date', $year)
            ->get();

        $totalExpenses = $expenses->sum('amount');

        $budget = Budget::where('user_id', $userId)
            ->where('month', $month)
            ->where('year', $year)
            ->get();

        $totalBudget = $budget->sum('budget_amount');

        return [
            'totalBudget' => $totalBudget,
            'totalExpenses' => $totalExpenses,
            'remainingBudget' => $totalBudget - $totalExpenses,
            'categorySummary' => $expenses
                ->groupBy(fn ($expense) => $expense->category->category_name)
                ->map(fn ($items) => $items->sum('amount')),
            'expenses' => $expenses,
        ];
    }
}