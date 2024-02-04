<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $guard = $this->auth->getDefaultDriver();

        if ($guard == 'web') {
            return $request->expectsJson() ? null : route('login');
        } elseif ($guard == 'admin') {
            return $request->expectsJson() ? null : route('admin.login');
        }

        return null;
    }
}
