<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->index();
            $table->string('title');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id')->index();
            $table->text('keywords')->nullable();
            $table->text('description')->nullable();
            $table->text('excerpt')->nullable();
//            $table->string('source')->nullable();
            $table->string('image')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('type')->default('default');
            $table->string('template')->nullable();
            $table->enum('status', ['published', 'draft', 'private'])->default('published');
            $table->boolean('top')->default(false);
            $table->unsignedInteger('order')->default(1);
            $table->unsignedInteger('views_count')->default(0);
            $table->unsignedInteger('likes_count')->default(0);
            $table->unsignedInteger('comments_count')->default(0);
//            $table->text('meta')->default('{}');
            $table->boolean('allow_comment')->default(true);
            $table->string('password')->nullable();
            $table->timestamp('published_at')->nullable()->useCurrent();
            $table->timestamp('viewed_at')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
