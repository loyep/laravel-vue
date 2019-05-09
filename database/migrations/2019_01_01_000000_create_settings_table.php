<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->string('group')->nullable()->default(null);
            $table->string('display_name')->nullable();
            $table->text('value')->nullable();
            $table->string('type');
            $table->text('details')->nullable()->default(null);
            $table->unsignedInteger('order')->default(1);
            $table->softDeletes();
            $table->timestamps();
            $table->unique(['key', 'group']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
