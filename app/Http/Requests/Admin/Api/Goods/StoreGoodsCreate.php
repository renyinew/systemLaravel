<?php

namespace App\Http\Requests\Admin\Api\Goods;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoodsCreate extends FormRequest
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
            'category_id' => 'required|integer',
            'title' => 'required|string',
            'content' => 'required|string',
            'status' => 'required|in:0,1',
            'picture' => 'required|json',
            'detail' => 'string',
            'keywords' => 'string',
            'description' => 'string',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'category_id.required' => '分类ID不能为空',
            'category_id.integer' => '分类错误',

            'title.required' => '商品标题不能为空',
            'title.string' => '商品标题错误',

            'content.required' => '商品正文不能为空',
            'content.string' => '商品正文错误',

            'status.required' => '商品状态不能为空',
            'status.in' => '商品状态错误',

            'picture.required' => '商品图片列表不能为空',
            'picture.json' => '商品图片列表错误',

            'detail.string' => '商品描述错误',

            'keywords.string' => '商品SEO关键词错误',

            'description.string' => '商品SEO描述错误'
        ];
    }
}
