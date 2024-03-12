<?php

namespace App\Providers;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function ($user, string $token) {
            if ($user instanceof Admin) {
                return 'http://127.0.0.1:8000/admin/reset-password/' . $token;
            } elseif ($user instanceof User) {
                return 'http://127.0.0.1:8000/reset-password/' . $token;
            }
    
            // Default to a generic URL if the user type is unknown
            return 'http://127.0.0.1:8000/reset-password/' . $token;
        });
    }
}
