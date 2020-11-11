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
            $table->string('id_recp');
            $table->string('recepcionado',20);
            $table->date('fecharadicado');
            $table->date('fecharecepcionado');
            $table->string('consultorio',20);
            $table->date('fechareparto');
            $table->date('fechapublicacion');
            $table->date('fecharetiro');
            $table->boolean('estado');
            $table->double('notpricort', 8,2)->nullable();
            $table->double('notsegcort', 8,2)->nullable();
            $table->double('nottercort', 8,2)->nullable();   
            $table->string('reclamante');                    
            $table->string('area');         
            $table->string('usuario');           
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
