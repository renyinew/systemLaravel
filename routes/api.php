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

    // unauthorized routes
    Route::post('authorization', 'Auth\AuthorizationController@store');

    // refresh token
    Route::put('authorization', 'Auth\AuthorizationController@refresh');

    // authorization routes
    Route::middleware([
        'auth:api',
        // 'role:super-admin'
    ])->group(function () {

        Route::namespace('Auth')->group(function () {
            // delete token
            Route::delete('authorization', 'AuthorizationController@destroy');

            // get user permission
            Route::get('me/permissions', 'PermissionController@store');

            // get current user detail
            Route::get('me', 'MeController@current');

            // update current user detail
            Route::patch('me', 'MeController@update');

            // update current user password
            Route::patch('me/password', 'MeController@password');
        });

        // User controller
        Route::namespace('Users')->group(function () {
            // get user detail
            Route::get('user/{$id}', 'UserController@view');

            // get users list
            Route::get('users', 'UserController@paginate');

            // view user permission
            Route::get('user/permission/{$id}', 'UserController@viewPermission');

            // set user permission
            Route::post('user/permission/{$id}', 'UserController@setPermission');
        });

        // Rbac controller
        Route::namespace('Permission')->group(function () {
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

            /****** role ******/
            // create role
            Route::post('role', 'RoleController@create');

            // role lists
            Route::get('roles', 'RoleController@lists');

            // role update
            Route::put('role/{id}', 'RoleController@update');

            // delete role
            Route::delete('role/{id}', 'RoleController@delete');

            /****** permission ******/
            // create role
            Route::post('permission', 'PermissionController@create');

            // role lists
            Route::get('permissions', 'PermissionController@lists');

            // role update
            Route::put('permission/{id}', 'PermissionController@update');

            // delete role
            Route::delete('permission/{id}', 'PermissionController@delete');

            /***** user and role and permission *****/
            // add permission to a role
            Route::post('role-to-permission/{role_id}', 'RolePermissionController@create');

            // add permissions to a role
            Route::post('role-to-permissions/{role_id}', 'RolePermissionController@creates');

            // view role permissions
            Route::get('role-to-permission/{role_id}', 'RolePermissionController@view');

            // remove role permission
            Route::delete('role-permission/{role_id}', 'RolePermissionController@delete');

            // remove role permissions
            Route::delete('role-permission/{role_id}', 'RolePermissionController@deletes');


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
        Route::namespace('Orders')->group(function () {

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