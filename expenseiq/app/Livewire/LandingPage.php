<?php

namespace App\Livewire;

use Livewire\Component;

class LandingPage extends Component
{
    public array $features = [
        [
            'title' => 'Expense Entry',
            'icon' => 'fa-receipt',
            'description' => 'Quickly log any transaction with category, amount, date, and payment method.',
        ],
        [
            'title' => 'Monthly Budgets',
            'icon' => 'fa-wallet',
            'description' => 'Set spending limits per category and get warned when you\'re running low.',
        ],
        [
            'title' => 'Budget Alerts',
            'icon' => 'fa-bell',
            'description' => 'Receive instant warnings when you reach 80% and 100% of your budget limit.',
        ],
        [
            'title' => 'Monthly Reports',
            'icon' => 'fa-chart-column',
            'description' => 'View charts and summaries of your spending habits over time.',
        ],
        [
            'title' => 'Export Reports',
            'icon' => 'fa-file-export',
            'description' => 'Download your reports as CSV or PDF anytime.',
        ],
        [
            'title' => 'User Accounts',
            'icon' => 'fa-user',
            'description' => 'Secure your personal account with your own private data and preferences.',
        ],
    ];

    public function render()
    {
        return view('livewire.landing-page')
            ->layout('layouts.guest');
    }
}