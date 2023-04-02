<?php

use App\Http\Controllers\Admin\{AuthController, CategoryController, DashboardController, PermissionController, RoleController, TagController};
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

            Route::group(['prefix' => '/{id}', 'middleware' => 'permission:admin.roles.edit'], function () {
                Route::get('edit', [RoleController::class, 'edit'])->name('edit');
                Route::put('update', [RoleController::class, 'update'])->name('update');
            });

            Route::get('delete', [RoleController::class, 'destroy'])->middleware('permission:admin.roles.destroy')->name('destroy');
        });

        //Permissions Routes
        Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
            Route::get('/', [PermissionController::class, 'index'])->name('index');

            Route::post('assign-permission', [PermissionController::class, 'assignPermissionToRole'])->name('assign-permission');
            Route::post('revoke-permission', [PermissionController::class, 'revokePermissionToRole'])->name('revoke-permission');
        });

        //Role Routes
        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::get('/', [CategoryController::class, 'index'])->middleware('permission:admin.categories.index')->name('index');

            Route::group(['middleware' => 'permission:admin.categories.create'], function () {
                Route::get('create', [CategoryController::class, 'create'])->name('create');
                Route::post('store', [CategoryController::class, 'store'])->name('store');
            });

            Route::group(['prefix' => '/{id}', 'middleware' => 'permission:admin.categories.edit'], function () {
                Route::get('edit', [CategoryController::class, 'edit'])->name('edit');
                Route::put('update', [CategoryController::class, 'update'])->name('update');
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
                Route::get('edit', [TagController::class, 'edit'])->name('edit');
                Route::put('update', [TagController::class, 'update'])->name('update');
            });

            Route::get('delete', [TagController::class, 'destroy'])->middleware('permission:admin.tags.destroy')->name('destroy');
        });
    });
});
