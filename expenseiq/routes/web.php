<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\LandingPage;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;

Route::get('/', LandingPage::class)->name('landing');

Route::get('/login', Login::class)->name('login');

Route::get('/register', Register::class)->name('register');