<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario', function (Blueprint $table) {
            
            $table->id();
            $table->text('coment');
            $table->date('fechapublcoment');

            $table->unsignedBigInteger('estu_id');
            $table->foreign('estu_id')->references('id')->on('users');

            $table->unsignedBigInteger('for_id');
            $table->foreign('for_id')->references('id')->on('foro');

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
        Schema::dropIfExists('comentario');
    }
}
