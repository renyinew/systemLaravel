<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// namespace "App\Http\Controllers\Admin"
Route::namespace('Admin\Api')->group(function () {

    // test route
    Route::get('test', function(){
        return 'hello test';
    });

    // unauthorized routes
    Route::post('authorization', 'Auth\AuthorizationController@store');

    // authorization routes
    Route::middleware(['auth:api'])->group(function () {

        // Auth controller
        Route::namespace('Auth')->group(function () {
            // refresh token
            Route::post('authorization/refresh', 'AuthorizationController@refresh');

            // delete token
            Route::delete('authorization', 'AuthorizationController@destroy');
        });

        // User controller
        Route::namespace('Users')->group(function () {
            // get user detail
            Route::get('user', 'UserController@me');

            //
        });

        // Rbac controller
        Route::namespace('Rbac')->group(function () {
            // get tree menu list
            Route::get('menu/select', 'MenuController@select');
        });

    });

});