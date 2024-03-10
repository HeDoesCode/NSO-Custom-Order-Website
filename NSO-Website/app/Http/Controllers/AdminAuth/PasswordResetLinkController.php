<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Models\Admin;


class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function __construct()
     {
         $this->middleware('guest:admin');
     }
     protected function guard()
      {
         return Auth::guard('admin');
      }

    protected function broker()
     {
        return Password::broker('admin'); //set password broker name according to guard which you have set in config/auth.php
     }
     
     public function create(): View
    {
        return view('admin.auth.forgot-password');
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
       
      
        $admin = Admin::where('username', $request->username)->first();

        if ($admin) {
            $status = Password::broker('admin')->sendResetLink(['email' => $admin->email]);
            $request->session()->put('adminEmail', $admin->email);


        } else {
            $status = "Admin Credential Invalid";
        }

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('username'))
                ->withErrors(['username' => __($status)]);
    }
}
