<?php

namespace App\Http\Requests\Admin\Api\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserPermissionUpdate extends FormRequest
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
            'role_name' => 'required|array'
        ];
    }

    public function messages()
    {
        return [
            'role_name.required' => '权限名称不能为空',
            'role_name.array' => '权限名称格式错误'
        ];
    }
}
