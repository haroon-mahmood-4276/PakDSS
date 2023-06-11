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
        $route = '';

        switch ($request->segment(1)) {
            case 'admin':
                $route = route('admin.login.view');
                break;

            case 'seller':
                $route = route('seller.login.view');
                break;

            default:
                $route = route('user.login.view');
                break;
        }

        return $request->expectsJson() ? null : $route;
    }
}
