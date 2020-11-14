<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespaldoRecepcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respaldo_recepciones', function (Blueprint $table) {
            $table->id();
            $table->string('id_recp')->nullable();
            $table->string('recepcionado',20)->nullable();
            $table->date('fecharadicado')->nullable();
            $table->date('fecharecepcionado')->nullable();
            $table->string('consultorio',20)->nullable();
            $table->date('fechareparto')->nullable();
            $table->date('fechapublicacion')->nullable();
            $table->date('fecharetiro')->nullable();
            $table->boolean('estado')->nullable();
            $table->double('notpricort', 8,2)->nullable();
            $table->double('notsegcort', 8,2)->nullable();
            $table->double('nottercort', 8,2)->nullable();   
            $table->string('reclamante')->nullable();                    
            $table->string('area')->nullable();         
            $table->string('usuario')->nullable();           
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
        Schema::dropIfExists('respaldo_recepciones');
    }
}
