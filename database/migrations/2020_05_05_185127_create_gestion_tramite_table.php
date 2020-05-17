<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGestionTramiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gestion_tramites', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('amplhechos,50');
            $table->date('fechentrevasesor');
            $table->string('tipotramite',50);
            $table->string('asuntotramite',50);
            $table->boolean('estado');
            $table->string('motivoarchivo',50);
            $table->date('fechaarchivo');
            $table->string('obsrvtramite',500);
            $table->string('actuarealizadas',100);
            $table->string('actjuridirealzadas',100);
            $table->string('resulactuacion',50);
            $table->string('entidadelantramite',50);
            $table->unsignedBigInteger('recp_id');
            $table->foreign('recp_id')->references('id')->on('recepciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gestion_tramites');
    }
}
