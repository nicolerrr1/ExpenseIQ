<?php

namespace App\Services;

use App\Models\Budget;
use App\Models\Expense;
use App\Models\Category;

class DashboardService
{
    public function getDashboardData(int $userId): array
    {
        // Current Month
        $expenses = Expense::where('user_id', $userId)
            ->whereMonth('expense_date', now()->month)
            ->whereYear('expense_date', now()->year);

        $budgets = Budget::where('user_id', $userId)
            ->where('month', now()->month)
            ->where('year', now()->year);

        $totalExpenses = $expenses->sum('amount');

        $totalBudget = $budgets->sum('budget_amount');

        $remainingBudget = max($totalBudget - $totalExpenses, 0);

        $expenseCount = $expenses->count();

        $recentExpenses = Expense::with('category')
            ->where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        $budgetPercentage = $totalBudget > 0
            ? ($totalExpenses / $totalBudget) * 100
            : 0;

        $showWarning = $budgetPercentage >= 80;

        /*
        |--------------------------------------------------------------------------
        | Category Chart
        |--------------------------------------------------------------------------
        */

        $categories = Category::orderBy('id')->get();

        $chartLabels = [];
        $chartData = [];

        $budgetProgress = [];

        foreach ($categories as $category) {

            $spent = Expense::where('user_id', $userId)
                ->where('category_id', $category->id)
                ->whereMonth('expense_date', now()->month)
                ->whereYear('expense_date', now()->year)
                ->sum('amount');

            $budget = Budget::where('user_id', $userId)
                ->where('category_id', $category->id)
                ->where('month', now()->month)
                ->where('year', now()->year)
                ->value('budget_amount') ?? 0;

            $percentage = $budget > 0
                ? min(($spent / $budget) * 100, 100)
                : 0;

            $chartLabels[] = $category->category_name;
            $chartData[] = $spent;

            $budgetProgress[] = [
                'name' => $category->category_name,
                'spent' => $spent,
                'budget' => $budget,
                'percentage' => $percentage,
            ];
        }

        return [

            'totalExpenses' => $totalExpenses,

            'totalBudget' => $totalBudget,

            'remainingBudget' => $remainingBudget,

            'expenseCount' => $expenseCount,

            'recentExpenses' => $recentExpenses,

            'budgetPercentage' => $budgetPercentage,

            'showWarning' => $showWarning,

            'chartLabels' => $chartLabels,

            'chartData' => $chartData,

            'budgetProgress' => $budgetProgress,

        ];
    }
}