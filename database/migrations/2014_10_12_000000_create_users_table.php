<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable(true)->comment('用户昵称');
            $table->string('avatar')->nullable(true)->comment('用户头像');
            $table->string('email')->unique()->nullable(true)->comment('用户邮箱');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->unique()->nullable(true)->comment('手机号');
            $table->decimal('amount', 10, 2)->default(0.00)->comment('余额');
            $table->string('password')->comment('用户密码');
            $table->tinyInteger('level')->default(0)->comment('前后台划分，默认为0，前台0，后台1');
            $table->tinyInteger('status')->default(1)->comment('用户状态，默认为正常，1正常，0封禁');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
