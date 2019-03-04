<?php

namespace App\Http\Requests\Admin\Api\Resource;

use Illuminate\Foundation\Http\FormRequest;

class AvatarCreate extends FormRequest
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
            'avatar' => 'required|dimensions:max_width=1000,max_height=1000,ratio=1/1'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'avatar.required' => '头像不能为空',
            'avatar.dimensions' => '头像只能为一比一且不能大于1000px'
        ];
    }
}
