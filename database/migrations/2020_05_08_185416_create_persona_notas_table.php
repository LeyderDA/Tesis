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
            $table->double('notapricort', 8, 2)->nullable();
            $table->double('notasegcort', 8, 2)->nullable();
            $table->double('notateracort', 8, 2)->nullable();
            $table->unsignedBigInteger('usu_id');
            $table->foreign('usu_id')->references('id')->on('users');

            $table->unsignedBigInteger('recp_id');
            $table->foreign('recp_id')->references('id')->on('recepciones');
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
