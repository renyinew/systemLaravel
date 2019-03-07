<?php

namespace App\Models\Admin\Api;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'menu';

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['name', 'parent_id', 'alias', 'icon', 'url'];

    /**
     * 模型链式调用获取树状数组数据
     * $treeMenus = find($id)->thisMenu;
     */
    public function thisMenu()
    {
        return $this->hasOne( get_class($this), 'id', 'id')->with('childMenu');
    }

    /**
     * 查找子分类
     */
    public function childMenu()
    {
        return $this->hasMany( get_class($this), 'parent_id', 'id')->with( 'childMenu');
    }
}
