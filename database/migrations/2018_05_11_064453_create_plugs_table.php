<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plugs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 150);
            $table->string('slug')->unique();
            $table->text('head');
            $table->string('subtitle', 150);
            $table->text('body');
            $table->string('image');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('plugs');
    }
}
