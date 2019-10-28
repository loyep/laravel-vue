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
            $table->unsignedBigInteger('user_id')->comment('用户');
            $table->unsignedBigInteger('category_id')->nullable()->comment('分类');
            $table->string('title')->comment('标题');
            $table->string('slug')->unique()->nullable()->comment('别名');
            $table->text('excerpt')->nullable()->comment('摘要');
            $table->string('image')->nullable()->comment('图片');
            $table->string('cover')->nullable()->comment('封面');
            $table->string('type')->default('default')->comment('文章类型');
            $table->enum('status', ['published', 'draft', 'private'])->default('draft')->comment('发布类型');
            $table->unsignedSmallInteger('order')->default(0)->comment('排序')->index();
            $table->unsignedMediumInteger('views_count')->default(0)->comment('访问量');
            $table->unsignedSmallInteger('likes_count')->default(0)->comment('点赞数');
            $table->unsignedSmallInteger('comments_count')->default(0)->comment('评论数');
            $table->enum('comment_type', ['allow', 'refuse', 'commented', 'logged'])->default('allow')->comment('评论类型');
            $table->string('password')->nullable()->comment('密码');
            $table->text('scripts')->nullable()->comment('扩展js');
            $table->text('styles')->nullable()->comment('扩展css');
            $table->json('settings')->nullable()->comment('自定义信息');
            $table->timestamp('published_at')->nullable()->useCurrent()->comment('发布时间');
            $table->timestamp('viewed_at')->nullable()->comment('访问时间');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['order', 'title', 'slug']);
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
