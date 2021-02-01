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
            $table->bigInteger('reading_answer_id')->unsigned()->nullable();
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('answer_option_id')->unsigned()->nullable();
            $table->bigInteger('set_id')->unsigned();
            $table->bigInteger('student_results_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('reading_submitted_answers', function( Blueprint $table){
            $table->foreign('reading_question_id')->references('id')->on('reading_questions')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('reading_submitted_answers', function( Blueprint $table){
            $table->foreign('student_results_id')->references('id')->on('student_results')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('reading_submitted_answers', function( Blueprint $table){
            $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        
        Schema::table('reading_submitted_answers', function(Blueprint $table){
            $table->foreign('answer_option_id')->references('id')->on('reading_options')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('reading_submitted_answers', function(Blueprint $table){
            $table->foreign('set_id')->references('id')->on('question_sets')->onUpdate('cascade')->onDelete('cascade');
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
