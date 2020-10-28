<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivosReclamantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivos_reclamantes', function (Blueprint $table) {
            $table->id();
            $table->string('archivoRe');
            $table->unsignedBigInteger('recla_id');
            $table->foreign('recla_id')->references('id')->on('reclamantes');
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
        Schema::dropIfExists('_archivos_reclamantes');
    }
}
