<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('u_id')->comment('发布文章用户ID');
            $table->tinyInteger('type')->comment('文章类型:0文章,1页面');
            $table->integer('c_id')->comment('文章所属分类ID，页面为空');
            $table->string('alias')->comment('页面必填，文章为空');
            $table->string('title')->comment('文章标题');
            $table->text('content')->comment('文章正文');
            $table->tinyInteger('status')->default(1)->comment('文章状态:-1删除,0草稿,1正常');
            $table->tinyInteger('hot')->default(0)->comment('热门文章:0普通文章,1热门文章');
            $table->tinyInteger('top')->default(0)->comment('置顶文章:0普通文章,1置顶文章');
            $table->integer('browse')->default(0)->comment('浏览量');
            $table->string('keywords')->nullable(true)->comment('关键词');
            $table->string('description')->nullable(true)->comment('描述');
            $table->softDeletes()->comment('软删除');
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
        Schema::dropIfExists('article');
    }
}
