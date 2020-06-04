<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('cedula',20)->unique(); 
            $table->string('prinom',20); 
            $table->string('segnom',20); 
            $table->string('priape',20); 
            $table->string('segape',20);
            $table->string('tel',15);
            $table->string('direc',30);  
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
        Schema::dropIfExists('personas');
    }
}
