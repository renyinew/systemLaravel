<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * 商品主表
         */
        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->comment('分类ID');
            $table->bigInteger('user_id')->comment('用户ID');
            $table->integer('sort')->default(1000000)->comment('排序');
            $table->string('title')->comment('商品标题');
            $table->text('content')->comment('商品正文');
            $table->text('picture')->comment('图片列表');
            $table->string('detail')->comment('商品描述');
            $table->tinyInteger('status')->default(1)->comment('商品状态(0下架，1上架)');
            $table->softDeletes()->comment('软删除');
            $table->timestamps();
        });

        /**
         * 商品`属性名`表
         */
        Schema::create('goods_attribute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('goods_id')->comment('商品ID');
            $table->bigInteger('parent_id')->comment('上级属性');
            $table->string('name')->comment('属性名');
            $table->timestamps();
        });

        /**
         * 商品`属性值`表
         */
        Schema::create('goods_value', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attribute_id')->comment('属性ID');
            $table->string('name')->comment('属性值名称');
            $table->timestamps();
        });

        /**
         * 商品`sku`表
         */
        Schema::create('goods_sku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attribute_id')->comment('属性名ID');
            $table->bigInteger('value_id')->comment('属性值ID');
            $table->integer('stock')->comment('库存');
            $table->decimal('price', 10, 2)->comment('价格');
            $table->decimal('original_price', 10, 2)->comment('原价');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
        Schema::dropIfExists('goods_attribute');
        Schema::dropIfExists('goods_value');
        Schema::dropIfExists('goods_sku');
    }
}
