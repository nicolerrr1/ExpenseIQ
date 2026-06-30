<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public string $first_name = '';
    public string $last_name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $monthly_budget = '';
    public bool $terms = false;

    protected function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'monthly_budget' => 'required|numeric|min:1',
            'terms' => 'accepted',
        ];
    }

    public function register()
    {
        $validated = $this->validate();

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'nickname' => null,
            'email' => $validated['email'],
            'password' => $validated['password'], // auto-hashed
            'monthly_budget' => $validated['monthly_budget'],
        ]);

        auth()->login($user);

        session()->regenerate();

        return redirect()->route('setup.nickname');
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('layouts.guest');
    }
}