<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\OnboardingController;
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

    Route::get('/welcome', [OnboardingController::class, 'step1'])
        ->name('welcome.step1');

    Route::post('/welcome', [OnboardingController::class, 'saveStep1'])
        ->name('welcome.step1.save');

    Route::get('/welcome/budget', [OnboardingController::class, 'step2'])
        ->name('welcome.step2');

    Route::post('/welcome/budget', [OnboardingController::class, 'saveStep2'])
        ->name('welcome.step2.save');

    Route::get('/welcome/finish', [OnboardingController::class, 'step3'])
        ->name('welcome.step3');

    Route::post('/welcome/finish', [OnboardingController::class, 'finish'])
        ->name('welcome.finish');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    Route::get('/budget', [BudgetController::class, 'index'])
        ->name('budget.index');

    Route::post('/budget/save', [BudgetController::class, 'save'])
        ->name('budget.save');

    //report

    Route::get('/reports', [ReportController::class,'index'])
        ->name('reports.index');

    Route::get('/reports/export/csv', [ExportController::class, 'csv'])
        ->name('reports.export.csv');

    //settings

    Route::get('/settings', [SettingsController::class, 'index'])
        ->name('settings');

    Route::get('/settings/password', [SettingsController::class, 'password'])
        ->name('settings.password.page');

    Route::get('/settings/danger', [SettingsController::class, 'danger'])
        ->name('settings.danger.page');

    Route::put('/settings/profile', [SettingsController::class, 'updateProfile'])
        ->name('settings.profile');

    Route::put('/settings/password', [SettingsController::class, 'updatePassword'])
        ->name('settings.password.update');

    Route::delete('/settings/clear-data', [SettingsController::class, 'clearData'])
        ->name('settings.clear');

    Route::delete('/settings/delete-account', [SettingsController::class, 'deleteAccount'])
        ->name('settings.delete');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('expenses', ExpenseController::class);

});