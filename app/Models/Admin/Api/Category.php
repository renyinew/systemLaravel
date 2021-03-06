<?php

namespace App\Models\Admin\Api;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['sort', 'name', 'type', 'alias', 'parent_id', 'keywords', 'description'];

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
