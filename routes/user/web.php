<?php

use App\Http\Controllers\User\{AuthController, HomeController};
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
        Route::get('login', [AuthController::class, 'loginView'])->name('login.view');
        Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');
    });


    Route::group(['middleware' => 'auth:web'], function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    });
});
