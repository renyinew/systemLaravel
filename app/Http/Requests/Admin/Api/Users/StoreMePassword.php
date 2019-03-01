<?php

namespace App\Http\Requests\Admin\Api\Users;

use Illuminate\Foundation\Http\FormRequest;

class StoreMePassword extends FormRequest
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
            'password' => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'password.required' => '密码不能为空',
            'password.string' => '密码格式错误',
        ];
    }

}
