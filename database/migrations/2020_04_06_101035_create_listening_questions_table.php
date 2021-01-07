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
            $table->bigInteger('question_sets_id')->unsigned()->nullable();
            // $table->string('question_content');
            $table->string('audio_file');
            $table->timestamps();
        });

        Schema::table('listening_questions', function (Blueprint $table){
            $table->foreign('question_sets_id')->references('id')->on('question_sets')->onDelete('cascade')->onUpdate("cascade");
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
