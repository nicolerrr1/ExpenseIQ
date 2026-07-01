<?php

namespace App\Http\Controllers;


use App\Models\Budget;
use App\Models\Category;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetController extends Controller
{
    public function index()
    {
        $order = [
            'Housing',
            'Food & Drinks',
            'Grocery',
            'Transportation',
            'Health',
            'Entertainment',
        ];

        $categories = Category::all()->sortBy(function ($category) use ($order) {
            return array_search($category->category_name, $order);
        });

        $budgets = Budget::where('user_id', Auth::id())
            ->where('month', now()->month)
            ->where('year', now()->year)
            ->get()
            ->keyBy('category_id');

        $spent = Expense::where('user_id', Auth::id())
            ->whereMonth('expense_date', now()->month)
            ->whereYear('expense_date', now()->year)
            ->selectRaw('category_id, SUM(amount) as total')
            ->groupBy('category_id')
            ->pluck('total', 'category_id');

        return view('livewire.budget.index', compact(
            'categories',
            'budgets',
            'spent'
        ));
    }

    public function save(Request $request)
    {
        foreach ($request->category_id as $index => $categoryId) {

            Budget::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'category_id' => $categoryId,
                    'month' => now()->month,
                    'year' => now()->year,
                ],
                [
                    'budget_amount' => $request->budget_amount[$index],
                ]
            );
        }

        return redirect()->route('budget.index')
            ->with('success', 'Budget saved successfully.');
    }
}