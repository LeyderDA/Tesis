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
            $table->BigIncrements('id');
            $table->decimal('notapricort', 5, 10)->nullable();
            $table->decimal('notasegcort', 5, 10)->nullable();
            $table->decimal('notateracort', 5, 10)->nullable();
            $table->decimal('notafinprom', 5, 10)->nullable();
            $table->unsignedBigInteger('usu_id');
            $table->foreign('usu_id')->references('id')->on('users');
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
        Schema::dropIfExists('notas');
    }
}
