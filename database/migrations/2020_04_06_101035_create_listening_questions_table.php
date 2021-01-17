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
            $table->bigInteger('listening_group_id')->unsigned()->nullable();
            // $table->string('question_content');
            $table->string('audio_file');
            $table->string('image_file')->nullable();
            $table->timestamps();
        });

        Schema::table('listening_questions', function (Blueprint $table){
            $table->foreign('listening_group_id')->references('id')->on('listening_groups')->onDelete('cascade')->onUpdate("cascade");
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
