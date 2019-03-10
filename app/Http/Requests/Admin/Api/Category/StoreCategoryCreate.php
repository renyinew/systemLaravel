<?php

namespace App\Http\Requests\Admin\Api\Category;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryCreate extends FormRequest
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
            'type' => 'required|in:0,1',
            'name' => 'required|string',
            'parent_id' => 'required|integer',
            'alias' => 'required|alpha_dash|unique:category,alias',
            'keywords' => 'string',
            'description' => 'string'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'sort.integer' => '分类排序错误',

            'type.required' => '分类类型不能为空',
            'type.in' => '分类类型错误',

            'name.required' => '分类名称不能为空',
            'name.string' => '分类名称错误',

            'parent_id.required' => '分类上级不能为空',
            'parent_id.integer' => '分类上级错误',

            'alias.required' => '分类别名不能为空',
            'alias.alpha_dash' => '菜单别名只能为字母数字下划线',
            'alias.unique' => '分类别名只能唯一',

            'keywords.string' => '分类关键词错误',

            'description.string' => '分类描述错误'
        ];
    }
}
