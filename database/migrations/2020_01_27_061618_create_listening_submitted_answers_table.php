<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeningSubmittedAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listening_submitted_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('listening_question_id')->unsigned();
            $table->bigInteger('listening_answer_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->string('listening_submitted_answer');
            $table->timestamps();
        });

        Schema::table('listening_submitted_answers', function( Blueprint $table){
            $table->foreign('listening_question_id')->references('id')->on('listening_questions')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('listening_submitted_answers', function( Blueprint $table){
            $table->foreign('listening_answer_id')->references('id')->on('listening_answers')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('listening_submitted_answers', function( Blueprint $table){
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listening_submitted_answers');
    }
}
