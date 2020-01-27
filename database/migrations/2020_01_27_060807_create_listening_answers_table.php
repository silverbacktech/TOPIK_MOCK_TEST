<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeningAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listening_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('listening_options_id')->unsigned();
            $table->string('listening_answer_content');
            $table->timestamps();
        });
        
        Schema::table('listening_answers', function (Blueprint $table){
            $table->foreign('listening_options_id')->references('id')->on('listening_options')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listening_answers');
    }
}
