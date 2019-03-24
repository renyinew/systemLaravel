<?php

namespace App\Models\Admin\Api;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'goods';

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['user_id', 'category_id', 'title', 'content', 'status', 'picture', 'detail', 'keywords', 'description'];
}
