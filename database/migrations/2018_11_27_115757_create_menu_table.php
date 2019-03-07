<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sort')->default(99)->comment('菜单排序');
            $table->string('name')->comment('菜单名称');
            $table->integer('parent_id')->comment('菜单分类ID');
            $table->string('alias')->nullable(true)->comment('菜单别名');
            $table->string('icon')->nullable(true)->comment('菜单ICON图标');
            $table->string('url')->comment('菜单链接');
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
        Schema::dropIfExists('menu');
    }
}
