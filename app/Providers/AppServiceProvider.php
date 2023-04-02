<?php

namespace App\Providers;

use App\Services\Admin\Categories\{CategoryInterface, CategoryService};
use App\Services\Admin\Permissions\{PermissionInterface, PermissionService};
use App\Services\Admin\Roles\{RoleInterface, RoleService};
use App\Services\Admin\Tags\{TagInterface, TagService};
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
        $this->app->bind(CategoryInterface::class, CategoryService::class);
        $this->app->bind(TagInterface::class, TagService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
