<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadingSubmittedAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_submitted_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('reading_question_id')->unsigned();
            $table->bigInteger('reading_answer_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->string('reading_submitted_answer');
            $table->timestamps();
        });

        Schema::table('reading_submitted_answers', function( Blueprint $table){
            $table->foreign('reading_question_id')->references('id')->on('reading_questions')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('reading_submitted_answers', function( Blueprint $table){
            $table->foreign('reading_answer_id')->references('id')->on('reading_answers')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('reading_submitted_answers', function( Blueprint $table){
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reading_submitted_answers');
    }
}
