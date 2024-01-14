<?php

use App\Http\Controllers\User\Ajax\AddressController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'user/ajax', 'as' => 'user.ajax.'], function () {
    Route::prefix('modal')->name('modal.')->group(function () {
        Route::prefix('addresses')->name('addresses.')->controller(AddressController::class)->group(function () {
            Route::get('create', 'create')->name('create');

            Route::prefix('search')->name('search.')->group(function () {
                Route::get('country', 'searchCountry')->name('country');
                Route::get('state', 'searchState')->name('state');
                Route::get('city', 'searchCity')->name('city');
            });
        });
    });
});
