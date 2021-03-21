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
            $table->bigInteger('reading_questions_id')->unsigned()->nullable();
            $table->string('reading_options_content');
            $table->integer('option_number');
            $table->timestamps();
        });

        Schema::table('reading_options', function (Blueprint $table){
            $table->foreign('reading_questions_id')->references('id')->on('reading_questions')->onDelete('cascade')->onUpdate('cascade');
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
