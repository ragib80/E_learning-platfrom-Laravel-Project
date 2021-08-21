<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('c_id');
            $table->string('quiz_name')->nullable();
            $table->string('description')->nullable();
            $table->string('quiz_date')->nullable();
            $table->string('quiz_time')->nullable();
            $table->string('number_of_question')->nullable();
            $table->string('status')->default(1);
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
        Schema::dropIfExists('quizes');
    }
}
