<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\{Exceptions, Middleware};
use Illuminate\Http\Request;
use Spatie\Permission\Middleware\{PermissionMiddleware, RoleMiddleware, RoleOrPermissionMiddleware};
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        health: '/laravel-health-check',
        then: function () {
            // Admin & Ajax Routes
            Route::middleware('web')
                ->prefix('admin')
                ->name('admin.')
                ->group(base_path('routes/admin/web.php'));

            // Seller & Ajax Routes
            Route::middleware('web')
                ->prefix('seller')
                ->name('seller.')
                ->group(base_path('routes/seller/web.php'));

            // User & Ajax Routes
            Route::middleware('web')
                ->name('user.')
                ->group([
                    base_path('routes/user/ajax.php'),
                    base_path('routes/user/web.php'),
                ]);
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(fn (Request $request) => match ($request->segment(1)) {
            'admin' => route('admin.login.view'),
            'seller' => route('seller.login.view'),
            default => route('user.login'),
        })->redirectUsersTo(function () {
            foreach (array_keys(config('auth.guards')) as $guard) {
                if (Auth::guard($guard)->check()) {
                    return match ($guard) {
                        'admin' => route('admin.dashboard.index'),
                        'seller' => route('seller.dashboard.index'),
                        'web' => route('user.home.index')
                    };
                }
            }
        })->alias([
            'role' => RoleMiddleware::class,
            'permission' => PermissionMiddleware::class,
            'role_or_permission' => RoleOrPermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
