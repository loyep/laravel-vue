<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('excerpt')->nullable();
            $table->unsignedSmallInteger('order')->default(1);
            $table->unsignedSmallInteger('view')->default(0);
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->string('type')->default('post');
            $table->enum('status', ['published', 'draft', 'private'])->default('published');
            $table->boolean('allow_comment')->default(true);
            $table->timestamp('published_at')->nullable()->useCurrent();
            $table->timestamp('viewed_at')->nullable()->useCurrent();
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
        Schema::dropIfExists('posts');
    }
}
