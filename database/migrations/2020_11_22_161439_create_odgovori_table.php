<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOdgovoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odgovori', function (Blueprint $table) {
           $table->engine = 'InnoDB';
            $table->id();
            $table->foreignId('pitanje_id')->constrained('id')->on('pitanja');
            $table->string('option');
            $table->tinyInteger('correct')->nullable()->default(0);
            
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
        Schema::dropIfExists('odgovori');
    }
}
