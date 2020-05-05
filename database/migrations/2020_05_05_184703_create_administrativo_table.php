<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrativoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrativo', function (Blueprint $table) {
            $table->unsignedBigInteger('usu_id');
            $table->unsignedBigInteger('recp_id');            
            $table->foreign('usu_id')->references('id')->on('users');
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
        Schema::dropIfExists('administrativo');
    }
}
