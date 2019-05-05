<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->string('description')->unique();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('menu_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->string('target')->default('_self');
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->unsignedTinyInteger('order')->default(0);
            $table->string('route')->nullable();
            $table->text('parameters')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('menu_items');
        Schema::dropIfExists('menus');
    }
}
