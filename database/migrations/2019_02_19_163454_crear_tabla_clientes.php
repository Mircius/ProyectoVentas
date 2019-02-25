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
    Schema::dropIfExists('clients');

    Schema::create('clients', function($table){
        $table->increments('IdClient');
        $table->string('Nombre');
        $table->string('Email')->unique();
        $table->integer('Telefono');
        $table->string('Direccio');
        $table->string('CIFNIF')->unique();
        $table->string('Provincia');
        $table->string('Localidad');
        $table->integer('CodigoPostal');
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
