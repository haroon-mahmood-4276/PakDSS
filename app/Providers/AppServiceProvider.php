<?php

namespace App\Providers;

use App\Services\Admin\Permissions\PermissionInterface as AdminPermissionInterface;
use App\Services\Admin\Permissions\PermissionService as AdminPermissionService;
use App\Services\Admin\Roles\RoleInterface as AdminRoleInterface;
use App\Services\Admin\Roles\RoleService as AdminRoleService;
use App\Services\Admin\Sellers\SellerInterface as AdminSellerInterface;
use App\Services\Admin\Sellers\SellerService as AdminSellerService;
use App\Services\Admin\Users\UserInterface as AdminUserInterface;
use App\Services\Admin\Users\UserService as AdminUserService;

use App\Services\Seller\Products\ProductInterface as SellerProductInterface;
use App\Services\Seller\Products\ProductService as SellerProductService;
use App\Services\Seller\Shops\ShopInterface as SellerShopInterface;
use App\Services\Seller\Shops\ShopService as SellerShopService;

use App\Services\Shared\Brands\BrandInterface;
use App\Services\Shared\Brands\BrandService;
use App\Services\Shared\Categories\CategoryInterface;
use App\Services\Shared\Categories\CategoryService;
use App\Services\Shared\Tags\TagInterface;
use App\Services\Shared\Tags\TagService;

use App\Services\User\Products\ProductInterface as UserProductInterface;
use App\Services\User\Products\ProductService as UserProductService;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //Shared
        $this->app->bind(BrandInterface::class, BrandService::class);
        $this->app->bind(CategoryInterface::class, CategoryService::class);
        $this->app->bind(TagInterface::class, TagService::class);

        // Admin
        $this->app->bind(AdminRoleInterface::class, AdminRoleService::class);
        $this->app->bind(AdminUserInterface::class, AdminUserService::class);
        $this->app->bind(AdminPermissionInterface::class, AdminPermissionService::class);
        $this->app->bind(AdminSellerInterface::class, AdminSellerService::class);

        // Seller
        $this->app->bind(SellerShopInterface::class, SellerShopService::class);
        $this->app->bind(SellerProductInterface::class, SellerProductService::class);
        $this->app->bind(SellerRequestInterface::class, SellerRequestService::class);

        // User
        $this->app->bind(UserProductInterface::class, UserProductService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
