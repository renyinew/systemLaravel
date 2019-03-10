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
    Route::put('authorization', 'Auth\AuthorizationController@refresh');

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
            Route::get('menus', 'MenuController@lists');

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
            Route::get('category/article/select', 'ArticleController@select');

            // get goods tree category list
            Route::get('category/goods/select', 'GoodsController@select');

            // create category
            Route::post('category', 'CategoryController@create');

            // view category list
            Route::get('categorys', 'CategoryController@lists');

            // view article category list
            Route::get('category/article', 'ArticleController@lists');

            // view goods category list
            Route::get('category/goods', 'GoodsController@lists');

            // view category
            Route::get('category/{id}', 'CategoryController@view');

            // update category
            Route::put('category/{id}', 'CategoryController@update');

            // delete category
            Route::delete('category/{id}', 'CategoryController@delete');
        });

        // Article controller
        Route::namespace('Article')->group(function () {
            /**
             * 最高权限
             */
            // create article
            Route::post('article', 'ArticleController@create');

            // get article paginate
            Route::get('articles', 'ArticleController@paginate');

            // view article
            Route::get('article/{id}', 'ArticleController@view');

            // update article
            Route::put('article/{id}', 'ArticleController@update');

            // trash article
            Route::patch('article/trash/{id}', 'ArticleController@trash');

            // trash article
            Route::patch('article/regain/{id}', 'ArticleController@regain');

            // delete article
            Route::delete('article/{id}', 'ArticleController@delete');

            /**
             * 个人权限
             */
            // get article paginate
            Route::get('articles/mine', 'MineController@paginate');
        });

        // Goods controller
        Route::namespace('Goods')->group(function () {
            /**
             * 最高权限
             */
            // create article
            Route::post('goods', 'GoodsController@create');

            // get article paginate
            Route::get('goods', 'GoodsController@paginate');

            // view article
            Route::get('goods/{id}', 'GoodsController@view');

            // update article
            Route::put('goods/{id}', 'GoodsController@update');

            // trash article
            Route::patch('goods/trash/{id}', 'GoodsController@trash');

            // trash article
            Route::patch('goods/regain/{id}', 'GoodsController@regain');

            // delete article
            Route::delete('goods/{id}', 'GoodsController@delete');

            /**
             * 个人权限
             */
            // get article paginate
            Route::get('goods/mine', 'MineController@paginate');
        });

        // Config controller
        Route::namespace('Order')->group(function () {

        });

        // Resource controller
        Route::namespace('Resource')->group(function () {
            // create avatar
            Route::post('avatar', 'AvatarController@create');

            // delete avatar
            Route::delete('avatar', 'AvatarController@delete');

        });

        // Config controller
        Route::namespace('Config')->group(function () {

        });

    });

});