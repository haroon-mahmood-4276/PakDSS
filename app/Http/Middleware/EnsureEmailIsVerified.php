<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class EnsureEmailIsVerified
{
    public function handle($request, Closure $next, $redirectToRoute = null)
    {
        if (! $request->user() || ($request->user() instanceof MustVerifyEmail && ! $request->user()->hasVerifiedEmail())) {
            $route = '';
            switch ($request->segment(1)) {
                case 'seller':
                    $route = 'seller.verification.notice';
                    break;

                default:
                    $route = 'user.verification.notice';
                    break;
            }

            return $request->expectsJson() ? abort(403, 'Your email address is not verified.') : Redirect::guest(URL::route($redirectToRoute ?: $route));
        }

        return $next($request);
    }
}
