<?php

use App\Events\TestEvent;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\HomeController;
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

Route::group(['as' => 'user.'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::group(['middleware' => 'guest:web'], function () {
        Route::get('login', [AuthController::class, 'loginView'])->name('login');
        Route::post('login', [AuthController::class, 'loginPost'])->name('login');

        Route::get('/{social_account}/auth/redirect', [AuthController::class, 'socialiateRedirect'])->name('socialiate.redirect');

        Route::get('/{social_account}/auth/callback', [AuthController::class, 'socialiateCallback'])->name('socialiate.callback');
    });

    Route::group(['middleware' => 'auth:web'], function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::group(['prefix' => 'tests'], function () {
        Route::get('pusher', function() {
            event(new TestEvent('hello world'));
        });
    });
});
