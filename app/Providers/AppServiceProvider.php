<?php

namespace App\Providers;

use App\Services\Admin\Permissions\{PermissionInterface as AdminPermissionInterface, PermissionService as AdminPermissionService};
use App\Services\Admin\Roles\{RoleInterface as AdminRoleInterface, RoleService as AdminRoleService};
use App\Services\Admin\Sellers\{SellerInterface as AdminSellerInterface, SellerService as AdminSellerService};
use App\Services\Admin\Users\{UserInterface as AdminUserInterface, UserService as AdminUserService};
use App\Services\Admin\Settings\{SettingInterface as AdminSettingInterface,SettingService as AdminSettingService};

use App\Services\Seller\Requests\{RequestInterface as SellerRequestInterface, RequestService as SellerRequestService};

use App\Services\Shared\Brands\{BrandInterface, BrandService};
use App\Services\Shared\Categories\{CategoryInterface, CategoryService};
use App\Services\Shared\Shops\{ShopInterface, ShopService};
use App\Services\Shared\Tags\{TagInterface, TagService};

use App\Services\Products\{ProductInterface, ProductService};

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
        $this->app->bind(ShopInterface::class, ShopService::class);

        // Admin
        $this->app->bind(AdminRoleInterface::class, AdminRoleService::class);
        $this->app->bind(AdminUserInterface::class, AdminUserService::class);
        $this->app->bind(AdminPermissionInterface::class, AdminPermissionService::class);
        $this->app->bind(AdminSellerInterface::class, AdminSellerService::class);
        $this->app->bind(AdminSettingInterface::class, AdminSettingService::class);

        // Seller
        $this->app->bind(SellerRequestInterface::class, SellerRequestService::class);

        // User

        $this->app->bind(ProductInterface::class, ProductService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
