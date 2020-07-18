<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecepcionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepciones', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('recepcionado');
            $table->date('fecharadicado');
            $table->date('fecharecepcionado');
            $table->string('consultorio');
            $table->date('fechareparto');
            $table->date('fechapublicacion');
            $table->date('fecharetiro');
            $table->timestamps(); 

            $table->unsignedBigInteger('usu_id');
            $table->foreign('usu_id')->references('id')->on('personas'); 

            $table->unsignedBigInteger('asig_id');
            $table->foreign('asig_id')->references('id')->on('personas');

            $table->unsignedBigInteger('recep_id');
            $table->foreign('recep_id')->references('id')->on('personas');

            $table->unsignedBigInteger('recla_id');
            $table->foreign('recla_id')->references('id')->on('personas'); 

            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recepciones');
    }
}
