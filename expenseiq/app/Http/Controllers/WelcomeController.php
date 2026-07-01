<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    /**
     * STEP 1 - Nickname
     */
    public function step1()
    {
        return view('welcome.step1');
    }

    public function storeStep1(Request $request)
    {
        $request->validate([
            'nickname' => 'required|string|max:50',
        ]);

        $user = Auth::user();

        $user->nickname = $request->nickname;
        $user->save();

        return redirect()->route('welcome.step2');
    }

    /**
     * STEP 2 - Monthly Budget
     */
    public function step2()
    {
        return view('welcome.step2');
    }

    public function storeStep2(Request $request)
    {
        $request->validate([
            'budget' => 'required|numeric|min:1',
        ]);

        $categories = Category::all();

        $perCategory = $request->budget / max($categories->count(), 1);

        foreach ($categories as $category) {

            Budget::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'category_id' => $category->id,
                    'month' => now()->month,
                    'year' => now()->year,
                ],
                [
                    'budget_amount' => $perCategory,
                ]
            );
        }

        return redirect()->route('welcome.step3');
    }

    /**
     * STEP 3 - Welcome
     */
    public function step3()
    {
        return view('welcome.step3');
    }

    public function finish()
    {
        $user = Auth::user();

        $user->is_onboarded = true;
        $user->save();

        return redirect()->route('dashboard');
    }
}