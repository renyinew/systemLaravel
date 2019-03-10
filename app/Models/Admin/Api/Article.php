<?php

namespace App\Models\Admin\Api;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    /**
     * 软删除
     */
    use SoftDeletes;

    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'article';

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['category_id', 'user_id', 'title', 'content', 'status', 'keywords', 'description'];
}
