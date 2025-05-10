<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    /**
     * Show the user's profile.
     */
    public function show()
    {
        $user = Auth::user();
        return view('home.show', compact('user'));
    }

    /**
     * Load profile view.
     */
    public function profile()
    {
        try {
            $user = Auth::user();
            Log::info('Profile accessed', ['user_id' => $user->id]);
            return view('profile', compact('user'));
        } catch (\Exception $e) {
            Log::error('Profile access failed', ['error' => $e->getMessage()]);
            return redirect()->route('dashboard')->with('error', 'Unable to load profile.');
        }
    }

    // Optional: if you want to keep a custom update by ID (not typical for user profile)
    // Rename this if needed to avoid confusion with main update method
    public function customUpdate(Request $request, $id)
    {
        return redirect()->route('profile')->with('error', 'Update not implemented.');
    }
}
