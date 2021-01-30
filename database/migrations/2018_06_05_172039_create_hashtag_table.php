<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHashtagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hashtags', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name")->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        Schema::create('hashtag_question', function (Blueprint $table) {
            $table->integer('question_id')->unsigned();
            $table->integer('hashtag_id')->unsigned();

            $table->primary(['question_id', 'hashtag_id']);

            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('hashtag_id')->references('id')->on('hashtags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hashtag_question');
        Schema::dropIfExists('hashtags');
    }
}
