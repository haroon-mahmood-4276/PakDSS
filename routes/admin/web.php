<?php

use App\Http\Controllers\Admin\ApprovalController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Homepage\SliderController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('admin.dashboard.index');
});

Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login.view');
    Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
});

Route::group(['middleware' => 'auth:admin'], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    //Role Routes
    Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
        Route::get('/', [RoleController::class, 'index'])->middleware('permission:admin.roles.index')->name('index');

        Route::group(['middleware' => 'permission:admin.roles.create'], function () {
            Route::get('create', [RoleController::class, 'create'])->name('create');
            Route::post('store', [RoleController::class, 'store'])->name('store');
        });

        Route::group(['prefix' => '/{id}', 'middleware' => 'permission:admin.roles.edit'], function () {
            Route::get('edit', [RoleController::class, 'edit'])->whereNumber('id')->name('edit');
            Route::put('update', [RoleController::class, 'update'])->whereNumber('id')->name('update');
        });

        Route::get('delete', [RoleController::class, 'destroy'])->middleware('permission:admin.roles.destroy')->name('destroy');
    });

    //Permissions Routes
    Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
        Route::get('/', [PermissionController::class, 'index'])->name('index');

        Route::post('assign-permission', [PermissionController::class, 'assignPermissionToRole'])->name('assign-permission');
        Route::post('revoke-permission', [PermissionController::class, 'revokePermissionToRole'])->name('revoke-permission');
    });

    //Categories Routes
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [CategoryController::class, 'index'])->middleware('permission:admin.categories.index')->name('index');

        Route::group(['middleware' => 'permission:admin.categories.create'], function () {
            Route::get('create', [CategoryController::class, 'create'])->name('create');
            Route::post('store', [CategoryController::class, 'store'])->name('store');
        });

        Route::group(['prefix' => '/{id}', 'middleware' => 'permission:admin.categories.edit'], function () {
            Route::get('edit', [CategoryController::class, 'edit'])->whereNumber('id')->name('edit');
            Route::put('update', [CategoryController::class, 'update'])->whereNumber('id')->name('update');
        });

        Route::get('delete', [CategoryController::class, 'destroy'])->middleware('permission:admin.categories.destroy')->name('destroy');
    });

    //Tags Routes
    Route::group(['prefix' => 'tags', 'as' => 'tags.'], function () {
        Route::get('/', [TagController::class, 'index'])->middleware('permission:admin.tags.index')->name('index');

        Route::group(['middleware' => 'permission:admin.tags.create'], function () {
            Route::get('create', [TagController::class, 'create'])->name('create');
            Route::post('store', [TagController::class, 'store'])->name('store');
        });

        Route::group(['prefix' => '/{id}', 'middleware' => 'permission:admin.tags.edit'], function () {
            Route::get('edit', [TagController::class, 'edit'])->whereNumber('id')->name('edit');
            Route::put('update', [TagController::class, 'update'])->whereNumber('id')->name('update');
        });

        Route::get('delete', [TagController::class, 'destroy'])->middleware('permission:admin.tags.destroy')->name('destroy');
    });

    //Brands Routes
    Route::group(['prefix' => 'brands', 'as' => 'brands.'], function () {
        Route::get('/', [BrandController::class, 'index'])->middleware('permission:admin.brands.index')->name('index');

        Route::group(['middleware' => 'permission:admin.brands.create'], function () {
            Route::get('create', [BrandController::class, 'create'])->name('create');
            Route::post('store', [BrandController::class, 'store'])->name('store');
        });

        Route::group(['prefix' => '/{brand}', 'middleware' => 'permission:admin.brands.edit'], function () {
            Route::get('edit', [BrandController::class, 'edit'])->whereNumber('id')->name('edit');
            Route::put('update', [BrandController::class, 'update'])->whereNumber('id')->name('update');
        });

        Route::get('delete', [BrandController::class, 'destroy'])->middleware('permission:admin.brands.destroy')->name('destroy');
    });

    //Seller Routes
    Route::prefix('sellers')->name('sellers.')->controller(SellerController::class)->group(function () {
        Route::get('/', 'index')->middleware('permission:admin.sellers.index')->name('index');

        Route::group(['middleware' => 'permission:admin.sellers.create'], function () {
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
        });

        Route::group(['prefix' => '/{seller}'], function () {
            Route::get('edit', 'edit')->whereNumber('id')->middleware('permission:admin.sellers.edit')->name('edit');
            Route::put('update', 'update')->whereNumber('id')->middleware('permission:admin.sellers.edit')->name('update');

            //Shop Routes
            Route::prefix('shops')->name('shops.')->controller(ShopController::class)->group(function () {
                Route::get('/', 'index')->middleware('permission:admin.sellers.shops.index')->name('index');

                Route::group(['middleware' => 'permission:admin.sellers.shops.create'], function () {
                    Route::get('create', 'create')->name('create');
                    Route::post('store', 'store')->name('store');
                });

                Route::group(['prefix' => '/{shop}', 'middleware' => 'permission:admin.sellers.shops.edit'], function () {
                    Route::get('edit', 'edit')->whereNumber('shop')->name('edit');
                    Route::put('update', 'update')->whereNumber('shop')->name('update');
                });

                Route::get('delete', 'destroy')->middleware('permission:admin.sellers.shops.destroy')->name('destroy');
            });
        });

        Route::get('delete', 'destroy')->middleware('permission:admin.sellers.destroy')->name('destroy');
    });

    //User Routes
    Route::prefix('users')->name('users.')->controller(UserController::class)->group(function () {
        Route::get('/', 'index')->middleware('permission:admin.users.index')->name('index');

        Route::group(['middleware' => 'permission:admin.users.create'], function () {
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
        });

        Route::group(['prefix' => '/{id}', 'middleware' => 'permission:admin.users.edit'], function () {
            Route::get('edit', 'edit')->whereNumber('id')->name('edit');
            Route::put('update', 'update')->whereNumber('id')->name('update');
        });

        Route::get('delete', 'destroy')->middleware('permission:admin.users.destroy')->name('destroy');
    });

    //Admin Approval Routes
    Route::prefix('approvals')->name('approvals.')->controller(ApprovalController::class)->group(function () {

        Route::group(['prefix' => 'shops', 'as' => 'shops.', 'middleware' => 'permission:admin.approvals.shops.index'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('store', 'store')->name('store');

            Route::group(['prefix' => '/{id}'], function () {
                Route::get('/show', 'show')->name('show');
            });
        });

        Route::group(['prefix' => 'products', 'as' => 'products.', 'middleware' => 'permission:admin.approvals.products.index'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('store', 'store')->name('store');

            Route::group(['prefix' => '/{id}'], function () {
                Route::get('/show', 'show')->name('show');
            });
        });

        Route::group(['prefix' => 'sellers', 'as' => 'sellers.', 'middleware' => 'permission:admin.approvals.sellers.index'], function () {
            Route::get('/', 'index')->name('index');
            Route::get('store', 'store')->name('store');

            Route::group(['prefix' => '/{id}'], function () {
                Route::get('/show', 'show')->name('show');
            });
        });
    });

    //Settings Routes
    Route::prefix('settings')->name('settings.')->controller(SettingController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });

    //Homepage Slider Routes
    Route::name('homepage.')->prefix('homepage')->group(function () {
        Route::controller(SliderController::class)->name('sliders.')->prefix('sliders')->group(function () {
            Route::get('/', 'index')->middleware('permission:admin.homepage.sliders.index')->name('index');

            Route::middleware('permission:admin.homepage.sliders.create')->group(function () {
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
            });

            Route::middleware('permission:admin.homepage.sliders.edit')->prefix('/{sider}')->group(function () {
                Route::get('edit', 'edit')->whereNumber('id')->name('edit');
                Route::put('update', 'update')->whereNumber('id')->name('update');
            });

            Route::get('delete', 'destroy')->middleware('permission:admin.homepage.sliders.destroy')->name('destroy');
        });
    });
});
