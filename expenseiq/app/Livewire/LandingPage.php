<?php

namespace App\Livewire;

use Livewire\Component;

class LandingPage extends Component
{
    public array $features = [
        [
            'title' => 'Expense Entry',
            'icon' => 'fa-receipt',
            'description' => 'Quickly log every expense with categories, amount, and date.',
        ],
        [
            'title' => 'Monthly Budget',
            'icon' => 'fa-wallet',
            'description' => 'Set your monthly budget and monitor your remaining balance.',
        ],
        [
            'title' => 'Budget Alert',
            'icon' => 'fa-bell',
            'description' => 'Receive alerts when you are close to reaching your budget.',
        ],
        [
            'title' => 'View Reports',
            'icon' => 'fa-chart-column',
            'description' => 'Analyze your spending through charts and monthly summaries.',
        ],
        [
            'title' => 'Export Reports',
            'icon' => 'fa-file-export',
            'description' => 'Export your financial reports to CSV or PDF.',
        ],
        [
            'title' => 'User Accounts',
            'icon' => 'fa-user',
            'description' => 'Securely manage your profile and account information.',
        ],
    ];

    public function render()
    {
        return view('livewire.landing-page')
            ->layout('layouts.guest');
    }
}