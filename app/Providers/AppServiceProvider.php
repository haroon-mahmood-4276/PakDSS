<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Admin\Brands\{BrandInterface as AdminBrandInterface, BrandService as AdminBrandService};
use App\Services\Admin\Categories\{CategoryInterface as AdminCategoryInterface, CategoryService as AdminCategoryService};
use App\Services\Admin\Permissions\{PermissionInterface as AdminPermissionInterface, PermissionService as AdminPermissionService};
use App\Services\Admin\Roles\{RoleInterface as AdminRoleInterface, RoleService as AdminRoleService};
use App\Services\Admin\Tags\{TagInterface as AdminTagInterface, TagService as AdminTagService};
use App\Services\Admin\Sellers\{SellerInterface as AdminSellerInterface, SellerService as AdminSellerService};

use App\Services\Seller\Brands\{BrandInterface as SellerBrandInterface, BrandService as SellerBrandService};
use App\Services\Seller\Categories\{CategoryInterface as SellerCategoryInterface, CategoryService as SellerCategoryService};
use App\Services\Seller\Shops\{ShopInterface as SellerShopInterface, ShopService as SellerShopService};
use App\Services\Seller\Products\{ProductInterface as SellerProductInterface, ProductService as SellerProductService};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdminBrandInterface::class, AdminBrandService::class);
        $this->app->bind(AdminRoleInterface::class, AdminRoleService::class);
        $this->app->bind(AdminPermissionInterface::class, AdminPermissionService::class);
        $this->app->bind(AdminCategoryInterface::class, AdminCategoryService::class);
        $this->app->bind(AdminTagInterface::class, AdminTagService::class);
        $this->app->bind(AdminSellerInterface::class, AdminSellerService::class);

        // Seller
        $this->app->bind(SellerBrandInterface::class, SellerBrandService::class);
        $this->app->bind(SellerCategoryInterface::class, SellerCategoryService::class);
        $this->app->bind(SellerShopInterface::class, SellerShopService::class);
        $this->app->bind(SellerProductInterface::class, SellerProductService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
