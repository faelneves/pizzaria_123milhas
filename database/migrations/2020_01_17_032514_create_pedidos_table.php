<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nrcliente');
            $table->unsignedBigInteger('nrpizza');
            $table->string('status');
            $table->timestamps();

            $table->foreign('nrcliente')->references('id')->on('clientes')->onDelete('CASCADE');
            $table->foreign('nrpizza')->references('id')->on('pizzas')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
}
