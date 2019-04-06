<?php

namespace App\Http\Requests\Admin\Api\Permission;

use Illuminate\Foundation\Http\FormRequest;

class StorePermissionCreate extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '权限标识不能为空',
            'name.string' => '权限标识格式错误',
            'description.required' => '权限名称不能为空',
            'description.string' => '权限名称格式错误'
        ];
    }
}
