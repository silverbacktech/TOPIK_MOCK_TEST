<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeningOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listening_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('listening_question_id')->unsigned();
            $table->string('listening_questions_content');
            $table->timestamps();
        });

        Schema::table('listening_options', function (Blueprint $table){
            $table->foreign('listening_question_id')->references('id')->on('listening_questions')->onDelete('cascade')->onUPdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listening_options');
    }
}
