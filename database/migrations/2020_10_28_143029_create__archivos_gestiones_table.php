<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosGestionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_gestiones', function (Blueprint $table) {
            $table->id();
            $table->string('archivoGe');
            $table->unsignedBigInteger('ges_id');
            $table->foreign('ges_id')->references('id')->on('gestion_tramites');
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
        Schema::dropIfExists('_archivos_gestiones');
    }
}
