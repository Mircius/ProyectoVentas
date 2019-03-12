<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TipoDocs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('archivos', function($table){
            $table->increments('id');
            $table->integer('idVenta')->unsigned();            
            $table->foreign('idVenta')->references('id')->on('ventas');
            $table->string('archivo');
            $table->string('tipo');
            $table->string('estado');
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
        Schema::drop('archivos');
    }
}
