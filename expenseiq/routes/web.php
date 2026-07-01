<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\SettingsController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/reports', [ReportController::class,'index'])
        ->name('reports.index');

    Route::get('/budget', [BudgetController::class, 'index'])
        ->name('budget.index');

    Route::post('/budget/save', [BudgetController::class, 'save'])
        ->name('budget.save');

    Route::get('/reports/export/csv', [ExportController::class, 'csv'])
        ->name('reports.export.csv');

    Route::get('/settings', [SettingsController::class,'index'])
        ->name('settings.index');

    Route::put('/settings/profile', [SettingsController::class,'updateProfile'])
        ->name('settings.profile');

    Route::put('/settings/password', [SettingsController::class,'updatePassword'])
        ->name('settings.password');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('expenses', ExpenseController::class);

});