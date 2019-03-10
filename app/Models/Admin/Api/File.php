<?php

namespace App\Models\Admin\Api;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'file';

    /**
     * 可以被批量赋值的属性。
     *
     * @var array
     */
    protected $fillable = ['user_id', 'path', 'size'];
}
