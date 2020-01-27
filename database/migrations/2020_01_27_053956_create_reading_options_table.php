<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadingOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('reading_question_id')->unsigned();
            $table->string('reading_options_content');
            $table->timestamps();
        });

        Schema::table('reading_options', function (Blueprint $table){
            $table->foreign('reading_question_id')->references('id')->on('reading_questions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reading_options');
    }
}
