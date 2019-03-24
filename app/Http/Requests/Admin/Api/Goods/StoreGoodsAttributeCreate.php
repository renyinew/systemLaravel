<?php

namespace App\Http\Requests\Admin\Api\Goods;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Admin\Api\Attribute;

class StoreGoodsAttributeCreate extends FormRequest
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
            'attribute' => ['required', 'json', new Attribute()]
        ];
    }

    public function messages()
    {
        return [
            'attribute.required' => '商品属性不能为空',
            'attribute.json' => '商品属性错误',
        ];
    }
}
