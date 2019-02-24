<?php

namespace App\Http\Controllers\Admin\Api\Rbac;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\Api\Controller;
use App\Models\Admin\Api\Menu;

/**
 * @Resource("menu")
 */
class MenuController extends Controller
{
    /**
     * 获取下拉菜单数据
     * @Resource("menu", uri="/menu")
     * @Get("/menu/select")
     * @Versions({"v1"})
     * @Request(headers={"Authorization": "Bearer xxx"})
     *
     * @param Menu $menu
     * $menus = $menu->find(1)->thisMenu->toArray();
     * @return mixed
     */
    public function select(Menu $menu)
    {
        //获取包含顶级的所有树状数据
        $menus = $menu->find(1)->thisMenu->toArray();
        $menus = [$menus];
        $array = $this->recursive($menus);
        return $this->response->array($array)->setStatusCode(201);
    }

    /**
     * 侧栏数据返回(不包含顶级)。
     * @Resource("menu", uri="/sidebar")
     * @Get("/sidebar")
     * @Versions({"v1"})
     * @Request(headers={"Authorization": "Bearer xxx"})
     *
     * $menus = $menu->find(1)->childMenu->toArray()
     * @param Menu $menu
     * @return mixed
     */
    public function sidebar(Menu $menu)
    {
        //获取不含顶级的所有树状数据
        $menus = $menu->find(1)->childMenu->toArray();
        return $this->response->array($menus)->setStatusCode(201);
    }


    /**
     * 创建分类
     * @param StoreMenuCreate $create
     * @param Menu $menu
     * @return \Dingo\Api\Http\Response
     */
    public function create(StoreMenuCreate $create, Menu $menu)
    {
        $model = $menu->create($create->all());

        return $this->response->item($model, new MenuTransformer())
            ->setStatusCode(201);
    }

    /**
     * 获取单个分类信息
     * @param $id
     * @param Menu $menu
     * @return \Dingo\Api\Http\Response
     */
    public function view($id, Menu $menu)
    {
        try{
            $model = $menu->findOrFail($id);
            return $this->response->item($model, new MenuTransformer())
                ->setStatusCode(201);
        }catch(ModelNotFoundException $exception){
            throw new NotFoundHttpException('该菜单不存在');
        }
    }


    public function lists()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    /**
     * 递归函数处理
     * @param $data
     * @param int $n
     * @return array
     */
    protected function recursive($data, $n = 0)
    {
        $array = [];
        foreach($data as $key => $value) {
            $array[] = [ $value['id'] => str_repeat('|--', $n) . $value['name'] ];
            if(!empty($value['child_menu'])) {
                $array = array_merge($array, $this->recursive($value['child_menu'], $n+1));
            }
        }

        return $array;
    }
}
