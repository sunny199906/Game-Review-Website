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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->longText('content');
            $table->dateTime('comment_date');
            $table->integer('rating');
            $table->unsignedBigInteger('reviewer_id');
            $table->unsignedBigInteger('game_id');
            $table->timestamps();

            $table->foreign('reviewer_id')->references('id')->on('users')
               ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('game_id')->references('id')->on('games')
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
        Schema::dropIfExists('comments');
    }
};
