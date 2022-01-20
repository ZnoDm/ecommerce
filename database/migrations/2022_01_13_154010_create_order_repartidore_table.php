<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderRepartidoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_repartidore', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('repartidore_id');

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('repartidore_id')->references('id')->on('repartidores');

            $table->date('fechaEntrega');
            $table->string('nombreCliente');
            $table->string('direccion');
            $table->string('telefono');

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
        Schema::dropIfExists('order_repartidore');
    }
}
