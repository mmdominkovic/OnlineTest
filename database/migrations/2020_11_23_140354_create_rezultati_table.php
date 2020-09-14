<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRezultatiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rezultati', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('id')->on('users');
            $table->string('correct')->nullable();
            $table->datetime('date')->nullable();
            $table->foreignId('question_id')->constrained('id')->on('pitanja');

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
        Schema::dropIfExists('results');
    }
}
