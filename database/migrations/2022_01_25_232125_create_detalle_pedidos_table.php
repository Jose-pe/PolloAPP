<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->bigInteger('idpedido')->unsigned();
            $table->bigInteger('idplatillo')->unsigned()->nullable();
            $table->bigInteger('idbebida')->unsigned()->nullable();
            $table->bigInteger('idcomplemento')->unsigned()->nullable();
            $table->integer('cantidad');
            $table->double('subtotal');
            $table->timestamps();

            $table->foreign('idpedido')->references('id')->on('pedidos'); 
            $table->foreign('idplatillo')->references('id')->on('platillos');
            $table->foreign('idbebida')->references('id')->on('bebidas');
            $table->foreign('idcomplemento')->references('id')->on('complementos');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
}
