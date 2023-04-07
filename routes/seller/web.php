<?php

use App\Http\Controllers\Seller\{AuthController, BrandController, DashboardController};
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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


        Route::group(['middleware' => 'verified'], function () {
            Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
        });
    });
});


Route::get('/email/verify', function () {
    return view('seller.auth.verify-email');
})->middleware('auth:seller')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $seller = $request->user();
    $seller->email_verified_at = now()->timestamp;
    $seller->save();

    return redirect('/seller/dashboard');
})->middleware(['auth:seller', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->withSucces('Verification link sent!');
})->middleware(['auth:seller', 'throttle:6,1'])->name('verification.send');
