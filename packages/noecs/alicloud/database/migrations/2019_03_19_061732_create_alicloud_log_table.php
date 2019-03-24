<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlicloudLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alicloud_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('type')->comment('操作API类型');
            $table->tinyInteger('status')->comment('操作状态');
            $table->text('log')->comment('操作详细日志');
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
        Schema::dropIfExists('alicloud_log');
    }
}
