<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclamanteNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reclamante', function (Blueprint $table) {
            $table->string('enfodifervictima',5); 
            $table->string('genevictima',15);
            $table->integer('edadvictima');
            $table->string('discapavictima',10);
            $table->string('estravictima',5);
            $table->string('embaravictima',10);
            $table->string('grupetnicovictima',20);
            $table->string('persoentidreclama',50);
            $table->unsignedBigInteger('recp_id');
            $table->foreign('recp_id')->references('id')->on('recepcion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reclamante');
    }
}
