<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('game_name');
            $table->integer('rating');
            $table->integer('num_of_rating');
            $table->dateTime('publish_date');
            $table->string('icon_image');
            $table->longText('description');
            $table->string('banner_image');
            $table->unsignedBigInteger('game_provider_id');

            $table->timestamps();

            $table->foreign('game_provider_id')->references('id')->on('users')
               ->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
};
