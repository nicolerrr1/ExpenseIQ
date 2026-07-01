<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\SettingsService;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index', [
            'user' => Auth::user(),
        ]);
    }

    public function updateProfile(Request $request, SettingsService $service)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'nickname'   => 'nullable|string|max:255',
            'email'      => 'required|email|unique:users,email,'.Auth::id(),
        ]);

        $service->updateProfile(Auth::user(), $validated);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request, SettingsService $service)
    {
        $validated = $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $service->updatePassword(Auth::user(), $validated['password']);

        return back()->with('success', 'Password updated successfully.');
    }
}