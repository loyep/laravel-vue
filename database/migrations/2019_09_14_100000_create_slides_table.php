<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->enum('target', ['_blank', '_self', '_parent', '_top'])->default('_self');
            $table->unsignedSmallInteger('order')->default(0)->comment('排序');
            $table->boolean('status')->default(true);
            $table->nullableMorphs('slideable');
            $table->unsignedMediumInteger('views_count')->default(0);
            $table->json('settings')->nullable()->comment('自定义信息');
            $table->timestamps();
            $table->softDeletes();
            $table->index(['order', 'title']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slides');
    }
}
