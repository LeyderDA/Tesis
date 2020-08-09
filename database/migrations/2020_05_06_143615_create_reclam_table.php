<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamantes', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('enfodifervictima',5); 
            $table->string('genevictima',15);
            $table->integer('edadvictima');
            $table->string('discapavictima',10);
            $table->string('estravictima',5);
            $table->string('embaravictima',10);
            $table->string('grupetnicovictima',20);
            $table->string('persoentidreclama',50);
         

            $table->unsignedBigInteger('per_id');             
            $table->foreign('per_id')->references('id')->on('personas');
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
        Schema::dropIfExists('reclamantes');
    }
}
