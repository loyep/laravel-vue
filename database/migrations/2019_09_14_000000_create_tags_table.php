<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique()->comment('标签名');
            $table->string('slug')->unique()->nullable()->comment('别名');
            $table->string('image')->nullable()->comment('封面');
            $table->string('description')->nullable()->comment('描述');
            $table->unsignedSmallInteger('order')->default(0)->comment('排序');
            $table->json('settings')->nullable()->comment('自定义信息');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['order', 'name', 'slug']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
