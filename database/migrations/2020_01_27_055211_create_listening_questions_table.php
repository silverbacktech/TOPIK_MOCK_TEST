<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeningQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listening_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('question_set_id')->unsigned();
            $table->string('listening_questions_content');
            $table->timestamps();
        });

        Schema::table('listening_questions', function (Blueprint $table){
            $table->foreign('question_set_id')->references('id')->on('question_sets')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listening_questions');
    }
}
