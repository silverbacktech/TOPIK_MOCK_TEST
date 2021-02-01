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
            $table->bigInteger('question_group_id')->unsigned()->nullable();
            $table->string('question_content')->nullable();
            $table->string('question_instruction')->nullable();
            $table->string('question_image')->nullable();
            $table->timestamps();
        });

        Schema::table('reading_questions', function (Blueprint $table){
            $table->foreign('question_group_id')->references('id')->on('question_groups')->onDelete('cascade')->onUpdate('cascade');
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
