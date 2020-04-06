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
            $table->bigInteger('question_group_id')->unsigned()->nullable();
            $table->string('question_content');
            $table->string('question_image')->nullable();
            $table->string('start_time');
            $table->string('end_time');
            $table->timestamps();
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
