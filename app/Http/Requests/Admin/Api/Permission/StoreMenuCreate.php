<?php

namespace App\Http\Requests\Admin\Api\Permission;

use Illuminate\Foundation\Http\FormRequest;

/**
 * 创建侧栏菜单验证
 * Class StoreMenuCreate
 * @package App\Http\Requests\Admin\Api\Rbac
 */
class StoreMenuCreate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sort' => 'integer',
            'name' => 'required|string',
            'parent_id' => 'required|integer',
            'alias' => 'required|alpha_dash',
            'icon' => 'string',
            'url' => 'string'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'sort.integer' => '排序只能为整数',

            'name.required' => '菜单名称不能为空',
            'name.string' => '菜单名称错误',

            'parent_id.required' => '上级分类不能为空',
            'parent_id.integer' => '上级菜单参数错误',

            'alias.required' => '分类别名不能为空',
            'alias.alpha_dash' => '菜单别名只能为字母数字下划线',

            'icon.string' => 'icon错误',

            'url.string' => 'URL错误'
        ];
    }
}
