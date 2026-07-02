<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Personal Information
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $user = Auth::user();

        return view('settings.index', compact('user'));
    }

    /*
    |--------------------------------------------------------------------------
    | Password & Security
    |--------------------------------------------------------------------------
    */

    public function password()
    {
        $user = Auth::user();

        return view('settings.password', compact('user'));
    }

    /*
    |--------------------------------------------------------------------------
    | Danger Zone
    |--------------------------------------------------------------------------
    */

    public function danger()
    {
        $user = Auth::user();

        return view('settings.danger', compact('user'));
    }

    /*
    |--------------------------------------------------------------------------
    | Update Profile
    |--------------------------------------------------------------------------
    */

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([

            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'nickname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'monthly_budget' => 'required|numeric|min:0',

        ]);

        $user->update($validated);

        return redirect()
            ->route('settings')
            ->with('success', 'Profile updated successfully!');
    }

    /*
    |--------------------------------------------------------------------------
    | Update Password
    |--------------------------------------------------------------------------
    */

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {

            return back()->withErrors([
                'current_password' => 'Current password is incorrect.'
            ]);

        }

        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Clear All Data
    |--------------------------------------------------------------------------
    */

    public function clearData()
    {
        $user = Auth::user();

        $user->expenses()->delete();

        $user->budgets()->delete();

        $user->reports()->delete();

        return back()->with('success', 'All data has been cleared.');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Account
    |--------------------------------------------------------------------------
    */

    public function deleteAccount(Request $request)
    {
        $user = Auth::user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')
            ->with('success', 'Account deleted successfully.');
    }
}