<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('question_sets_id')->unsigned()->nullable();
            $table->string('group_text')->nullable();
            $table->timestamps();
        });

        Schema::table('question_groups', function (Blueprint $table){
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
        Schema::dropIfExists('question_groups');
    }
}
