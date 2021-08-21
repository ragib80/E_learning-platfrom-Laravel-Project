<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('quizes_id')->unsigned();
             $table->integer('c_id')->unsigned();
            $table->string('question')->nullable();
            $table->string('answer')->nullable();
            $table->string('status')->nullable();
            $table->string('options')->nullable();
              $table->string('note')->nullable();
            $table->string('user_id')->nullable();
            
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
        Schema::dropIfExists('questions');
    }
}
