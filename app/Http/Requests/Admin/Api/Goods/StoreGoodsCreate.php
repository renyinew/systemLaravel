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
            'picture' => 'required',
            'detail' => 'string',
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

        ];
    }
}
