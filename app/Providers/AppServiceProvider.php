<?php

namespace App\Providers;

use App\Services\Admin\Permissions\{PermissionInterface, PermissionService};
use App\Services\Admin\Roles\{RoleInterface, RoleService};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(RoleInterface::class, RoleService::class);
        $this->app->bind(PermissionInterface::class, PermissionService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
