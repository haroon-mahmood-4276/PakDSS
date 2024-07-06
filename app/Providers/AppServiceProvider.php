<?php

namespace App\Providers;

use App\Services\Permissions\{PermissionInterface as AdminPermissionInterface, PermissionService as AdminPermissionService};
use App\Services\Roles\{RoleInterface as AdminRoleInterface, RoleService as AdminRoleService};
use App\Services\Sellers\{SellerInterface as AdminSellerInterface, SellerService as AdminSellerService};
use App\Services\Users\{UserInterface as AdminUserInterface, UserService as AdminUserService};
use App\Services\Settings\{SettingInterface as AdminSettingInterface,SettingService as AdminSettingService};

use App\Services\Requests\{RequestInterface as SellerRequestInterface, RequestService as SellerRequestService};

use App\Services\Brands\{BrandInterface, BrandService};
use App\Services\Categories\{CategoryInterface, CategoryService};
use App\Services\Shops\{ShopInterface, ShopService};
use App\Services\Tags\{TagInterface, TagService};

use App\Services\Products\{ProductInterface, ProductService};
use App\Services\Cart\{CartInterface, CartService};
use App\Services\Addresses\{AddressInterface, AddressService};
use App\Services\Countries\{CountryInterface, CountryService};
use App\Services\States\{StateInterface, StateService};
use App\Services\Cities\{CityInterface, CityService};
use App\Services\Orders\{OrderInterface, OrderService};
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
        $this->app->bind(CartInterface::class, CartService::class);
        $this->app->bind(AddressInterface::class, AddressService::class);
        $this->app->bind(CountryInterface::class, CountryService::class);
        $this->app->bind(StateInterface::class, StateService::class);
        $this->app->bind(CityInterface::class, CityService::class);
        $this->app->bind(OrderInterface::class, OrderService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
