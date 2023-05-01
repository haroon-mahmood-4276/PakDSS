<?php

use App\Http\Controllers\Seller\{AuthController, BrandController, CategoryController, DashboardController, ProductController, ShopController};
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['as' => 'seller.', 'prefix' => 'seller'], function () {

    Route::get('/', function () {
        return redirect()->route('seller.dashboard.index');
    });

    Route::group(['middleware' => 'guest:seller'], function () {
        Route::get('register', [AuthController::class, 'registerView'])->name('register.view');
        Route::post('register', [AuthController::class, 'registerPost'])->name('register.post');

        Route::get('login', [AuthController::class, 'loginView'])->name('login.view');
        Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
    });

    Route::group(['middleware' => ['auth:seller']], function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        Route::group(['middleware' => 'auth:seller', 'prefix' => 'email'], function () {
            Route::get('/verify', [AuthController::class, 'verifyEmailView'])->name('verification.notice');
            Route::get('/verify/{id}/{hash}', [AuthController::class, 'verifyEmailPost'])->middleware('signed')->name('verification.verify');

            Route::post('/verification-notification', [AuthController::class, 'verificationNotification'])->middleware('throttle:6,1')->name('verification.send');
        });

        Route::group(['middleware' => 'verified'], function () {
            Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
            Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

            //Shop Routes
            Route::group(['prefix' => 'shops', 'as' => 'shops.'], function () {
                Route::get('/', [ShopController::class, 'index'])->name('index');

                Route::group([], function () {
                    Route::get('create', [ShopController::class, 'create'])->name('create');
                    Route::post('store', [ShopController::class, 'store'])->name('store');
                });

                Route::group(['prefix' => '/{id}'], function () {
                    Route::get('edit', [ShopController::class, 'edit'])->whereUuid('id')->name('edit');
                    Route::put('update', [ShopController::class, 'update'])->whereUuid('id')->name('update');
                });

                Route::get('delete', [ShopController::class, 'destroy'])->name('destroy');
            });

            //Products Routes
            Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
                Route::get('/', [ProductController::class, 'index'])->name('index');

                Route::group([], function () {
                    Route::get('create', [ProductController::class, 'create'])->name('create');
                    Route::post('store', [ProductController::class, 'store'])->name('store');
                });

                Route::group(['prefix' => '/{id}'], function () {
                    Route::get('edit', [ProductController::class, 'edit'])->whereUuid('id')->name('edit');
                    Route::put('update', [ProductController::class, 'update'])->whereUuid('id')->name('update');
                });

                Route::get('delete', [ProductController::class, 'destroy'])->name('destroy');
            });
        });
    });
});
