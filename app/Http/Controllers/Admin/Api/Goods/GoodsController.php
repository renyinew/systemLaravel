<?php

namespace App\Http\Controllers\Admin\Api\Goods;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\Api\Controller;
use App\Http\Requests\Admin\Api\Goods\StoreGoodsCreate;
use App\Http\Requests\Admin\Api\Goods\StoreGoodsAttributeCreate;

class GoodsController extends Controller
{
    public function create(Request $request, StoreGoodsCreate $goodsCreate, StoreGoodsAttributeCreate $attributeCreate)
    {
        try {
            DB::beginTransaction();

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }

    }

    public function lists()
    {

    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function trash()
    {

    }

    public function regain()
    {

    }

    public function delete()
    {

    }
}
