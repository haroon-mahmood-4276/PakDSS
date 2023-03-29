<?php

use App\Http\Controllers\Admin\{AuthController, DashboardController, PermissionController, RoleController};
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

Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {

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

            Route::get('delete', [RoleController::class, 'destroy'])->middleware('permission:admin.roles.destroy')->name('destroy');

            Route::group(['prefix' => '/{id}', 'middleware' => 'permission:admin.roles.edit'], function () {
                Route::get('edit', [RoleController::class, 'edit'])->name('edit');
                Route::put('update', [RoleController::class, 'update'])->name('update');
            });
        });

        //Permissions Routes
        Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
            Route::get('/', [PermissionController::class, 'index'])->middleware('permission:admin.permissions.index')->name('index');

            Route::post('assign-permission', [PermissionController::class, 'assignPermissionToRole'])->middleware('permission:admin.permissions.assign-permission')->name('assign-permission');
            Route::post('revoke-permission', [PermissionController::class, 'revokePermissionToRole'])->middleware('permission:admin.permissions.revoke-permission')->name('revoke-permission');
        });
    });
});
