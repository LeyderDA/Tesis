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
