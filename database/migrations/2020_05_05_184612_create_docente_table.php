<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocenteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->unsignedBigInteger('usu_id');
	        $table->unsignedBigInteger('area_id');
	        $table->unsignedBigInteger('recp_id');

	        $table->foreign('usu_id')->references('id')->on('users');
	        $table->foreign('area_id')->references('id')->on('areas');
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
        Schema::dropIfExists('docentes');
    }
}
