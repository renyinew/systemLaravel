<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class MenuTableSeeder extends Seeder
{

    private $defaultMenu = [
        //顶级菜单
        ['id' => 1, 'sort' => 0, 'name' => '顶级菜单', 'parent_id' => 0, 'icon'=>'simple-icon-screen-desktop', 'alias' => 'top', 'url' => '/'],
        ['id' => 2, 'sort' => 99, 'name' => '系统报表', 'parent_id' => 1, 'icon'=>'simple-icon-pie-chart', 'alias' => 'system', 'url' => '/system'],
        ['id' => 3, 'sort' => 99, 'name' => '权限系统', 'parent_id' => 1, 'icon'=>'simple-icon-lock', 'alias' => 'rbac', 'url' => '/rbac'],
        ['id' => 4, 'sort' => 99, 'name' => '分类管理', 'parent_id' => 1, 'icon'=>'simple-icon-folder-alt', 'alias' => 'category', 'url' => '/category'],
        ['id' => 5, 'sort' => 99, 'name' => '文章系统', 'parent_id' => 1, 'icon'=>'simple-icon-book-open', 'alias' => 'article', 'url' => '/article'],
        ['id' => 6, 'sort' => 99, 'name' => '商品系统', 'parent_id' => 1, 'icon'=>'simple-icon-basket-loaded', 'alias' => 'goods', 'url' => '/goods'],
        ['id' => 7, 'sort' => 99, 'name' => '订单系统', 'parent_id' => 1, 'icon'=>'simple-icon-printer', 'alias' => 'orders', 'url' => '/orders'],
        ['id' => 8, 'sort' => 99, 'name' => '聊天室', 'parent_id' => 1, 'icon'=>'simple-icon-bubbles', 'alias' => 'chat', 'url' => '/chat'],
        ['id' => 9, 'sort' => 99, 'name' => '网站管理', 'parent_id' => 1, 'icon'=>'simple-icon-settings', 'alias' => 'config', 'url' => '/config'],

        //二级菜单
        ['id' => 10, 'sort' => 99, 'name' => '菜单列表', 'parent_id' => 3, 'icon'=>'iconsmind-Folder-Archive', 'alias' => 'menu', 'url' => '/rbac/menu'],

        ['id' => 13, 'sort' => 99, 'name' => '添加分类', 'parent_id' => 4, 'icon'=>'iconsmind-Folder-Archive', 'alias' => 'create', 'url' => '/category/create'],
        ['id' => 14, 'sort' => 99, 'name' => '分类列表', 'parent_id' => 4, 'icon'=>'iconsmind-Folder-Archive', 'alias' => 'list', 'url' => '/category/list'],

        ['id' => 15, 'sort' => 99, 'name' => '发布文章', 'parent_id' => 5, 'icon'=>'iconsmind-Folder-Archive', 'alias' => 'create', 'url' => '/article/create'],
        ['id' => 16, 'sort' => 99, 'name' => '文章列表', 'parent_id' => 5, 'icon'=>'iconsmind-Folder-Archive', 'alias' => 'list', 'url' => '/article/list'],
        ['id' => 17, 'sort' => 99, 'name' => '我的文章', 'parent_id' => 5, 'icon'=>'iconsmind-Folder-Archive', 'alias' => 'mylist', 'url' => '/article/mylist'],

        ['id' => 18, 'sort' => 99, 'name' => '发布宝贝', 'parent_id' => 6, 'icon'=>'iconsmind-Folder-Archive', 'alias' => 'goods', 'url' => '/goods/create'],
        ['id' => 19, 'sort' => 99, 'name' => '宝贝列表', 'parent_id' => 6, 'icon'=>'iconsmind-Folder-Archive', 'alias' => 'list', 'url' => '/goods/list'],
        ['id' => 20, 'sort' => 99, 'name' => '我的宝贝', 'parent_id' => 6, 'icon'=>'iconsmind-Folder-Archive', 'alias' => 'mygoods', 'url' => '/goods/mylist'],

        ['id' => 21, 'sort' => 99, 'name' => '订单列表', 'parent_id' => 7, 'icon'=>'iconsmind-Folder-Archive', 'alias' => 'list', 'url' => '/orders/list'],
        ['id' => 22, 'sort' => 99, 'name' => '我的订单', 'parent_id' => 7, 'icon'=>'iconsmind-Folder-Archive', 'alias' => 'mylist', 'url' => '/orders/mylist'],


        ['id' => 23, 'sort' => 99, 'name' => '消息列表', 'parent_id' => 8, 'icon'=>'iconsmind-Speach-Bubble6', 'alias' => 'friends', 'url' => '/chat/friends'],

        ['id' => 24, 'sort' => 99, 'name' => '基本设置', 'parent_id' => 9, 'icon'=>'iconsmind-Folder-Archive', 'alias' => 'basic', 'url' => '/config/basic'],
        ['id' => 25, 'sort' => 99, 'name' => 'SEO配置', 'parent_id' => 9, 'icon'=>'iconsmind-Folder-Archive', 'alias' => 'seo', 'url' => '/config/seo'],

        //三级菜单
        ['id' => 26, 'sort' => 99, 'name' => '添加菜单', 'parent_id' => 10, 'icon'=>'iconsmind-Folder-Add', 'alias' => 'create', 'url' => '/rbac/create'],
    ];

    /**
     * 顶级菜单
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert($this->defaultMenu);
    }
}
