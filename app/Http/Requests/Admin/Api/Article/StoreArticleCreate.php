<?php

namespace App\Http\Requests\Admin\Api\Article;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreArticleCreate extends FormRequest
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
            'c_id' => ['required', 'integer'],
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'status' => ['required', Rule::in([0, 1])],
            'keywords' => ['string'],
            'description' => ['string']
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'c_id.required' => '分类不能为空',
            'c_id.integer' => '分类错误',

            'title.required' => '文章名称不能为空',
            'title.string' => '文章名称错误',

            'content.required' => '文章正文不能为空',
            'content.string' => '文章正文错误',

            'status.required' => '文章状态不能为空',
            'status.in' => '文章状态错误',

            'keywords.string' => '文章关键词错误',

            'description.string' => '文章描述错误'
        ];
    }
}
