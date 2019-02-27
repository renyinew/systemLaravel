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
            // get current user detail
            Route::get('me', 'MeController@current');

            // update current user detail
            Route::patch('me', 'MeController@update');

            // update current user password
            Route::patch('me/password', 'MeController@password');

            // get user detail
            Route::get('user', 'UserController@view');

            // get users list
            Route::get('users', 'UserController@list');
        });

        // Rbac controller
        Route::namespace('Rbac')->group(function () {
            // get tree menu list
            Route::get('menu/select', 'MenuController@select');

            // get tree menu sidebar
            Route::get('menu/sidebar', 'MenuController@sidebar');

            // create menu
            Route::post('menu', 'MenuController@create');

            // view menu list
            Route::get('menus', 'MenuController@list');

            // view menu
            Route::get('menu/{id}', 'MenuController@view');

            // update menu
            Route::put('menu/{id}', 'MenuController@update');

            // delete menu
            Route::delete('menu/{id}', 'MenuController@delete');
        });

        // Category controller
        Route::namespace('Category')->group(function () {
            // get tree menu list
            Route::get('category/select', 'CategoryController@select');

            // get tree menu sidebar
            Route::get('category/sidebar', 'CategoryController@sidebar');

            // create menu
            Route::post('category', 'CategoryController@create');

            // view menu list
            Route::get('categorys', 'CategoryController@list');

            // view menu
            Route::get('category/{id}', 'CategoryController@view');

            // update menu
            Route::put('category/{id}', 'CategoryController@update');

            // delete menu
            Route::delete('category/{id}', 'CategoryController@delete');
        });

    });

});