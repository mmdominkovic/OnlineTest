<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePitanjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pitanja', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
      //      $table->integer('predmet_id')->unsigned();
            $table->foreignId('predmet_id')->constrained('id')->on('predmeti');
            $table->text('question_text');
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
        Schema::dropIfExists('pitanja');
    }
}
