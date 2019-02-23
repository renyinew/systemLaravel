<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer( 'sort')->default(99)->comment('分类排序');
            $table->tinyInteger('type')->nullable(true)->comment('分类类型，0商品，1文章.顶级分类无需内容');
            $table->string('name')->comment('分类名称');
            $table->integer('p_id')->comment('父级分类ID');
            $table->string('alias')->unique()->comment('分类别名');
            $table->string('keywords')->nullable(true)->comment('关键词');
            $table->string('description')->nullable(true)->comment('描述');
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
