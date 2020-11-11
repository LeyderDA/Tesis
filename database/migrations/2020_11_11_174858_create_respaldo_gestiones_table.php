<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespaldoGestionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respaldo_gestiones', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('gest_id');
            $table->string('amplhechos',50);
            $table->date('fechentrevasesor');
            $table->string('tipotramite',50);
            $table->string('asuntotramite',50);          
            $table->string('motivoarchivo',50)->nullable();
            $table->date('fechaarchivo')->nullable();
            $table->string('obsrvtramite',500);
            $table->string('actuarealizadas',100);
            $table->string('actjuridirealzadas',100);
            $table->string('resulactuacion',50);
            $table->string('entidadelantramite',50);   
            $table->date('fechpriact');
            $table->integer('n_act');
            $table->integer('n_aseso'); 
            $table->integer('n_autor');        
            $table->string('asesor',20);            
            $table->unsignedBigInteger('recp_id');
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
        Schema::dropIfExists('respaldo_gestiones');
    }
}
