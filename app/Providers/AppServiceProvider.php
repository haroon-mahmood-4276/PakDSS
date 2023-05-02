<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Shared\Brands\{BrandInterface, BrandService};
use App\Services\Shared\Categories\{CategoryInterface, CategoryService};
use App\Services\Shared\Tags\{TagInterface, TagService};

use App\Services\Admin\Permissions\{PermissionInterface as AdminPermissionInterface, PermissionService as AdminPermissionService};
use App\Services\Admin\Roles\{RoleInterface as AdminRoleInterface, RoleService as AdminRoleService};
use App\Services\Admin\Sellers\{SellerInterface as AdminSellerInterface, SellerService as AdminSellerService};

use App\Services\Seller\Shops\{ShopInterface as SellerShopInterface, ShopService as SellerShopService};
use App\Services\Seller\Products\{ProductInterface as SellerProductInterface, ProductService as SellerProductService};

use App\Services\User\Products\{ProductInterface as UserProductInterface, ProductService as UserProductService};

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
        $this->app->bind(AdminPermissionInterface::class, AdminPermissionService::class);
        $this->app->bind(AdminSellerInterface::class, AdminSellerService::class);

        // Seller
        $this->app->bind(SellerShopInterface::class, SellerShopService::class);
        $this->app->bind(SellerProductInterface::class, SellerProductService::class);

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
