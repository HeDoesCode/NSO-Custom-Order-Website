<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Models\User;


class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required'],
        ]);
        

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $user = User::where('username', $request->username)->orWhere('email', $request->username)->first();

        if ($user) {
            // Send the password reset link using the user's email
            $status = Password::sendResetLink([
                'email' => $user->email,
            ]);
            $request->session()->put('userEmail', $user->email);
            $request->session()->put('userName', $user->username);
        } else {
            // Handle the case where the username doesn't exist.
            $status = "User Credential Invalid";
        }

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('username'))
                ->withErrors(['username' => __($status)]);
    }
}
