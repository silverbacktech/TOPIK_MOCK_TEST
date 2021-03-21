<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeningAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listening_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('listening_questions_id')->unsigned();
            $table->bigInteger('listening_options_id')->unsigned();
            $table->integer('option_number');
            $table->timestamps();
        });

        Schema::table('listening_answers',function(Blueprint $table){
            $table->foreign('listening_questions_id')->references('id')->on('listening_questions')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('listening_answers', function (Blueprint $table){
            $table->foreign('listening_options_id')->references('id')->on('listening_options')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listening_answers');
    }
}
