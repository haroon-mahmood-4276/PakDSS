<?php

use App\Events\TestEvent;
use App\Http\Controllers\User\{
    AddressController,
    AuthController,
    BrandController,
    CartController,
    HomeController,
    OrderController,
    ProductController,
};
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Brands Route
Route::as('brands.')->controller(BrandController::class)->prefix('brands')->group(function () {
    Route::get('{brand:slug}', 'index')->name('index');
});

// Products Route
Route::as('products.')->controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('{product:permalink}', 'index')->name('index');
});

Route::group(['middleware' => 'guest:web'], function () {
    Route::get('login', [AuthController::class, 'loginView'])->name('login');
    Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');

    Route::get('/{social_account}/auth/redirect', [AuthController::class, 'socialiateRedirect'])->name('socialiate.redirect');

    Route::get('/{social_account}/auth/callback', [AuthController::class, 'socialiateCallback'])->name('socialiate.callback');
});

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::controller(OrderController::class)->group(function () {
        Route::post('shipping', 'selectShippingAddress')->name('checkout.shipping');
        Route::post('order/place', 'placeOrder')->name('order.store');

        Route::get('payment', 'selectPaymentMethod')->name('checkout.payment');
    });

    // Cart Route
    Route::as('cart.')->controller(CartController::class)->prefix('cart')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('store', 'store')->name('store');

        Route::put('update', 'update')->name('update');

        Route::group(['prefix' => '/{cart}'], function () {
            Route::get('delete', 'delete')->whereNumber('cart')->name('delete');
        });
    });

    // Address Route
    Route::prefix('addresses')->name('addresses.')->controller(AddressController::class)->group(function () {
        Route::get('/', 'index')->name('index');

        Route::group([], function () {
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
        });
        
        Route::group(['prefix' => '/{address}'], function () {
            Route::get('edit', 'edit')->whereNumber('address')->name('edit');
            Route::put('update', 'update')->whereNumber('address')->name('update');
            Route::get('delete', 'destroy')->whereNumber('address')->name('destroy');
        });

    });
});
