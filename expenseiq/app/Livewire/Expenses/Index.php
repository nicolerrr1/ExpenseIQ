<?php

namespace App\Livewire\Expenses;

use Livewire\Component;
use App\Models\Expense;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public function render()
    {
        return view('livewire.expenses.index', [
            'expenses' => Expense::with('category')
                ->where('user_id', Auth::id())
                ->latest()
                ->get(),

            'categories' => Category::orderBy('category_name')->get(),
        ]);
    }
}