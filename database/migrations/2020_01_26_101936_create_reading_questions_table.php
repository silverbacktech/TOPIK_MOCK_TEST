<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadingQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('question_sets')->unsigned();
            $table->string('question_content');
            $table->timestamps();
        });

        Schema::table('reading_questions', function (Blueprint $table){
            $table->foreign('question_sets')->references('id')->on('question_sets')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reading_questions');
    }
}
