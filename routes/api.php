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

    // refresh token
    Route::patch('authorization', 'Auth\AuthorizationController@refresh');

    // authorization routes
    Route::middleware(['auth:api'])->group(function () {
        // delete token
        Route::delete('authorization', 'Auth\AuthorizationController@destroy');

        // User controller
        Route::namespace('Users')->group(function () {
            // get current user detail
            Route::get('me', 'MeController@current');

            // update current user detail
            Route::put('me', 'MeController@update');

            // update current user password
            Route::put('me/password', 'MeController@password');

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
            // get article tree category list
            Route::get('category/article/select', 'CategoryController@selectArticle');

            // get goods tree category list
            Route::get('category/goods/select', 'CategoryController@selectGoods');

            // create category
            Route::post('category', 'CategoryController@create');

            // view category list
            Route::get('categorys', 'CategoryController@list');

            // view article category list
            Route::get('category/article', 'CategoryController@articleList');

            // view goods category list
            Route::get('category/goods', 'CategoryController@goodsList');

            // view category
            Route::get('category/{id}', 'CategoryController@view');

            // update category
            Route::put('category/{id}', 'CategoryController@update');

            // delete category
            Route::delete('category/{id}', 'CategoryController@delete');
        });

        // Article controller
        Route::namespace('Article')->group(function () {
            // create article
            Route::post('article', 'ArticleController@crete');

            // get article list
            Route::get('article', 'ArticleController@list');

            // view article
            Route::get('article/{id}', 'ArticleController@view');

            // update article
            Route::put('article/{id}', 'ArticleController@update');

            // trash article
            Route::put('article/{id}', 'ArticleController@trash');

            // delete article
            Route::delete('article/{id}', 'ArticleController@delete');
        });

        // Resource controller
        Route::namespace('Resource')->group(function () {
            // create avatar
            Route::post('avatar', 'AvatarController@create');

            // delete avatar
            Route::delete('avatar', 'AvatarController@delete');

        });

        //
    });

});