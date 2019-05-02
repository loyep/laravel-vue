<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('友情链接名称');
            $table->string('description')->nullable()->comment('友情链接描述');
            $table->string('url')->comment('友情链接地址');
            $table->integer('rating')->default(0)->comment('友情链接评级');
            $table->string('image')->nullable()->comment('友情链接图标');
            $table->string('target', 16)->comment('友情链接打开方式');
            $table->string('rel')->nullable()->comment('链接与网站的关系');
            $table->integer('order')->default(0)->comment('排序');
            $table->boolean('status')->default(true)->comment('状态');
            $table->index(['order', 'name']);
            $table->softDeletes();
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
        Schema::dropIfExists('links');
    }
}
