<?php

use App\Http\Controllers\Seller\{AuthController, BrandController, DashboardController};
use Illuminate\Support\Facades\Route;

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
        Route::get('login', [AuthController::class, 'loginView'])->name('login.view');
        Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
    });


    Route::group(['middleware' => 'auth:seller'], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('brands', [BrandController::class, 'index'])->name('brands.index');

    });
});
