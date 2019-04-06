<?php

namespace App\Http\Requests\Admin\Api\Permission;

use Illuminate\Foundation\Http\FormRequest;

class StoreRolePermissionCreate extends FormRequest
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
            'id' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => '权限标识不能为空',
            'id.integer' => '权限标识必须为数字'
        ];
    }
}
