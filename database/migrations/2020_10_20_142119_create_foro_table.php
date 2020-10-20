<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foro', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',50);
            $table->text('descripcion');
            $table->date('fechapublicación');
            $table->boolean('estadoFo');

            $table->unsignedBigInteger('doc_id');
            $table->foreign('doc_id')->references('id')->on('users');

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
        Schema::dropIfExists('foro');
    }
}
