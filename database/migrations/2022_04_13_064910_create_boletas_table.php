<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boletas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('nro');
            $table->date('fecha');
            $table->double('total');
            $table->bigInteger('idpedido')->unsigned();
            $table->bigInteger('iduser')->unsigned();
            $table->timestamps();

            $table->foreign('iduser')->references('id')->on('users');
            $table->foreign('idpedido')->references('id')->on('pedidos'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boletas');
    }
}
