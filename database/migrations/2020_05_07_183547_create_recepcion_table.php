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
            $table->string('recepcionado',20);
            $table->date('fecharadicado')->nullable();
            $table->date('fecharecepcionado')->nullable();
            $table->string('consultorio',20);
            $table->date('fechareparto')->nullable();
            $table->date('fechapublicacion')->nullable();
            $table->date('fecharetiro')->nullable();
            $table->boolean('estado');
            $table->double('notpricort', 8,2)->nullable();
            $table->double('notsegcort', 8,2)->nullable();
            $table->double('nottercort', 8,2)->nullable();   
            $table->unsignedBigInteger('recla_id');
            $table->foreign('recla_id')->references('id')->on('reclamantes');            
            $table->unsignedBigInteger('area_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->unsignedBigInteger('usu_id')->nullable();
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
        Schema::dropIfExists('recepciones');
    }
}
