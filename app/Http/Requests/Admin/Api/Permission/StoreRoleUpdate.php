<?php

namespace App\Http\Requests\Admin\Api\Permission;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleUpdate extends FormRequest
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
            'guard_name' => 'required|string',
            'name' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'guard_name.required' => '权限标识不能为空',
            'name.required' => '权限名称不能为空'
        ];
    }
}
