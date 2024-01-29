<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
{
    // Fetch the user based on the provided email
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        // Handle the case where the user with the provided email doesn't exist.
        return back()->withErrors(['email' => __('User not found')]);
    }

    return view('auth.reset-password', ['request' => $request, 'username' => $user->username]);
}


    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'token' => ['required'],
        'username' => ['required'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    // Fetch the user based on the provided email
    $user = User::where('email', $request->email)->first();

    if (!$user) {
        // Handle the case where the user with the provided email doesn't exist.
        return back()->withErrors(['email' => __('User not found')]);
    }

    // Here we will attempt to reset the user's password.
    $status = Password::reset(
        $request->only('username', 'password', 'password_confirmation', 'token'),
        function ($user) use ($request) {
            // Update the user's password
            $user->forceFill([
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
            ])->save();

            event(new PasswordReset($user));
        }
    );

    // If the password was successfully reset, we will redirect the user back to
    // the application's home authenticated view. If there is an error, we can
    // redirect them back to where they came from with their error message.
    return $status == Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', __($status))
        : back()->withInput($request->only('username'))
            ->withErrors(['username' => __($status)]);
}

}