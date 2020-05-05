<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->bigInteger('cedula')->unique();
            $table->integer('notapricort');
            $table->integer('notasegcort');
            $table->integer('notateracort');
            $table->integer('notafinprom');
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
        Schema::dropIfExists('notas');
    }
}
