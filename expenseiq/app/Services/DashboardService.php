<?php

namespace App\Services;

use App\Models\Budget;
use App\Models\Expense;

class DashboardService
{
    public function getDashboardData(int $userId): array
    {
        $totalExpenses = Expense::where('user_id', $userId)
            ->sum('amount');

        $totalBudget = Budget::where('user_id', $userId)
            ->sum('budget_amount');

        $remainingBudget = $totalBudget - $totalExpenses;

        $expenseCount = Expense::where('user_id', $userId)
            ->count();

        $recentExpenses = Expense::with('category')
            ->where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return [
            'totalExpenses' => $totalExpenses,
            'totalBudget' => $totalBudget,
            'remainingBudget' => $remainingBudget,
            'expenseCount' => $expenseCount,
            'recentExpenses' => $recentExpenses,
        ];
    }
}