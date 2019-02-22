<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaClientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::dropIfExists('clientes');

    Schema::create('clientes', function($table){
        $table->increments('idClient');
        $table->string('nombre');
        $table->string('email')->unique();
        $table->integer('telefono');
        $table->string('direccion');
        $table->string('cifNif')->unique();
        $table->string('provincia');
        $table->string('localidad');
        $table->integer('codigoPostal');
        $table->timestamps();
    });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
