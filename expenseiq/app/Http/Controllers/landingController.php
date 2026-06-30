<?php

namespace App\Http\Controllers;

class LandingController extends Controller
{
    public function index()
    {
        $features = [

            [
                'title' => 'Expense entry',
                'icon' => 'fa-receipt',
                'description' => 'Quickly log any transaction with category, amount, date, and payment method.',
            ],

            [
                'title' => 'Monthly budgets',
                'icon' => 'fa-wallet',
                'description' => 'Set spending limits per category and get warned when you\'re running low.',
            ],

            [
                'title' => 'Budget alerts',
                'icon' => 'fa-bell',
                'description' => 'Receive instant warnings at 80% and 100% of your spending limit.',
            ],

            [
                'title' => 'Monthly reports',
                'icon' => 'fa-chart-column',
                'description' => 'Visual charts and summaries of your spending habits over time.',
            ],

            [
                'title' => 'Export reports',
                'icon' => 'fa-file-export',
                'description' => 'Download your data as CSV or PDF anytime for records.',
            ],

            [
                'title' => 'User accounts',
                'icon' => 'fa-user',
                'description' => 'Secure personal account with your own private data and preferences.',
            ],

        ];

        return view('landing-page', compact('features'));
    }
}