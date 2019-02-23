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

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Admin\Api',
    //API调用速率
//    'middleware' => ['api.throttle', 'serializer:array'],
    //调用次数
    'limit' => env('API_LIMIT', 60),
    //过期时间
    'expires' => env('API_EXPIRES', 1),
], function($api) {
    /* Routes that do not require access_token */
    $api->group([
        'namespace' => '\Auth'
    ], function($api){
        //密码生成
        /*$api->get('password', function (){
            return \Illuminate\Support\Facades\Hash::make('123456');
        });*/
        //验证码获取
        //$api->get('captcha', 'CaptchaController@store');

        //登录
        $api->post('authorizations', 'AuthorizationsController@store');
    });



    /* Route requiring access_token */
    $api->group([
        'middleware' => 'api.auth'
    ], function($api){
        /**
         * 用户操作
         */
        $api->group([
            'namespace' => '\Users'
        ], function($api){
            //获取d登录个人信息
            $api->get('user', 'UserController@me');
        });

        /**
         * 菜单管理
         */
        $api->group([
            'namespace' => '\Rbac'
        ], function($api){
            //添加
            $api->post('menu', 'MenuController@create');
            //获取分类select项
            $api->get('menu/select', 'MenuController@select');
            //获取单个分类信息
            $api->get('menu/{id}', 'MenuController@view')->where('id', '[0-9]+');
            //获取全部分类信息
            $api->get('menus', 'MenuController@list');
            //修改，单数
            $api->patch('menu/{id}', 'MenuController@update')->where('id', '[0-9]+');
            //删除，单数
            $api->delete('menu', 'MenuController@delete');
            /*特殊的一个API接口，返回sidebar数据*/
            $api->get('sidebar', 'MenuController@sidebar');
        });

        /**
         * 分类管理
         */
        $api->group([
            'namespace' => '\Category'
        ], function($api){
            //获取分类select项
            $api->get('category/select', 'CategoryController@select');
            //添加
            $api->post('category', 'CategoryController@create');
            //获取分类信息，单数
            $api->get('category/{id}', 'CategoryController@view')->where('id', '[0-9]+');
            //获取分类信息，复数
            $api->get('categories', 'CategoryController@list');
            //修改，单数
            $api->patch('category/{id}', 'CategoryController@update')->where('id', '[0-9]+');
            //删除，单数
            $api->delete('category', 'CategoryController@delete');

        });

        /**
         * 文章管理
         */
        $api->group([
            'namespace' => '\Article'
        ], function($api){
            //获取文章分类select项
            $api->get('article/select', 'CategoryController@select');
            //添加
            $api->post('article', 'ArticleController@create');
            //获取文章信息，单数
            $api->get('article/{id}', 'ArticleController@view')->where('id', '[0-9]+');
            //获取分类信息，复数
            $api->get('articles', 'ArticleController@list');
            //修改，单数
            $api->patch('article/{id}', 'ArticleController@update')->where('id', '[0-9]+');
            //删除，单数
            $api->delete('article', 'ArticleController@delete');
        });



    });

});