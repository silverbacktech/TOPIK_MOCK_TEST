<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListeningGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listening_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('question_sets_id')->unsigned()->nullable();
            $table->string('group_text')->nullable();
            $table->timestamps();
        });

        Schema::table('listening_groups', function (Blueprint $table){
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
        Schema::dropIfExists('listening_groups');
    }
}
