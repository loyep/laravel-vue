<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('name')->unique()->comment('用户名');
            $table->string('display_name')->nullable()->comment('显示名');
            $table->string('email')->unique()->nullable()->comment('邮箱');
            $table->string('mobile')->unique()->nullable()->comment('手机号');
            $table->string('cover')->nullable()->comment('封面');
            $table->string('thumbnail')->nullable()->comment('缩略图');
            $table->string('url')->nullable()->comment('网址');
            $table->string('avatar')->nullable()->comment('头像');
            $table->string('bio')->nullable()->comment('简介');
            $table->enum('status', ['inactivated', 'active', 'frozen'])->default('inactivated')->comment('状态');
            $table->boolean('is_admin')->default(false)->comment('是否为站长');
            $table->json('settings')->nullable()->comment('自定义信息');
            $table->json('properties')->nullable()->comment('用户设置');
            $table->string('password')->comment('密码');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->timestamp('last_active_at')->nullable()->comment('最后活跃时间');
            $table->unsignedBigInteger('creator')->default(0)->index()->comment('创建者');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
