<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadingAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reading_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('reading_options_id')->unsigned();
            $table->integer('option_number');
            $table->timestamps();
        });

        Schema::table('reading_answers', function (Blueprint $table){
            $table->foreign('reading_options_id')->references('id')->on('reading_options')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reading_answers');
    }
}
