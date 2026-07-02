<?php

namespace App\Services;

use App\Models\Expense;
use App\Models\Budget;

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

        $totalBudget = Budget::where('user_id', $userId)
            ->where('month', $month)
            ->where('year', $year)
            ->sum('budget_amount');

        $remainingBudget = $totalBudget - $totalExpenses;

        $categorySummary = $expenses
            ->groupBy(fn($expense) => $expense->category->category_name)
            ->map(fn($items) => $items->sum('amount'));

        return [
            'totalBudget' => $totalBudget,
            'totalExpenses' => $totalExpenses,
            'remainingBudget' => $remainingBudget,
            'categorySummary' => $categorySummary,
            'expenses' => $expenses,
        ];
    }
}