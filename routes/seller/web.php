<?php

use App\Http\Controllers\Seller\{AuthController, BrandController, CategoryController, DashboardController, ProductController, RequestController, ShopController};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('seller.dashboard.index');
});

Route::middleware('guest:seller')->controller(AuthController::class)->group(function () {
    Route::get('register', 'registerView')->name('register.view');
    Route::post('register', 'registerPost')->name('register.post');

    Route::get('login', 'loginView')->name('login.view');
    Route::post('login', 'loginPost')->name('login.post');
});

Route::group(['middleware' => ['auth:seller']], function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('auth:seller')->prefix('email')->controller(AuthController::class)->group(function () {
        Route::get('/verify', 'verifyEmailView')->name('verification.notice');
        Route::get('/verify/{id}/{hash}', 'verifyEmailPost')->middleware('signed')->name('verification.verify');

        Route::post('/verification-notification', 'verificationNotification')->middleware('throttle:6,1')->name('verification.send');
    });

    Route::group(['middleware' => 'verified'], function () {

        Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
        Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

        //Shop Routes
        Route::prefix('shops')->name('shops.')->controller(ShopController::class)->group(function () {
            Route::get('/', 'index')->name('index');

            Route::group([], function () {
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
            });

            Route::group(['prefix' => '/{shop}'], function () {
                Route::get('edit', 'edit')->whereNumber('id')->name('edit');
                Route::put('update', 'update')->whereNumber('id')->name('update');
            });

            Route::get('delete', 'destroy')->name('destroy');
        });

        //Products Routes
        Route::prefix('products')->name('products.')->controller(ProductController::class)->group(function () {
            Route::get('/', 'index')->name('index');

            Route::group([], function () {
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
            });

            Route::group(['prefix' => '/{id}'], function () {
                Route::get('edit', 'edit')->whereNumber('id')->name('edit');
                Route::put('update', 'update')->whereNumber('id')->name('update');
            });

            Route::get('delete', 'destroy')->name('destroy');
        });

        //Requests Routes
        Route::prefix('requests/{request}')->name('requests.')->controller(RequestController::class)->group(function () {
            Route::get('/', 'index')->name('index');

            Route::group([], function () {
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
            });

            Route::group(['prefix' => '/{id}'], function () {
                Route::get('edit', 'edit')->whereNumber('id')->name('edit');
                Route::put('update', 'update')->whereNumber('id')->name('update');
            });

            Route::get('delete', 'destroy')->name('destroy');
        });
    });
});