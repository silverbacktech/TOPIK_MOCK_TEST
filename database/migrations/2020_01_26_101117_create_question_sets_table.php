<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionSetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_sets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('language_id')->unsigned();
            $table->string('name');
            $table->timestamps();
        });

        Schema::table('question_sets', function (Blueprint $table){
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade')->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_sets');
    }
}
