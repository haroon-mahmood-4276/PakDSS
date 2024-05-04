<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Permission\Middleware\{PermissionMiddleware, RoleMiddleware, RoleOrPermissionMiddleware};
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        using: function () {
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
                ->group(base_path('routes/user/web.php'));
        },
        health: '/laravel-health-check',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->redirectGuestsTo(fn () => route('login.view'))
            ->redirectUsersTo(fn () => route('dashboard.index'))
            ->alias([
                'role' => RoleMiddleware::class,
                'permission' => PermissionMiddleware::class,
                'role_or_permission' => RoleOrPermissionMiddleware::class,
            ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
