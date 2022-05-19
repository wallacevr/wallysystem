<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_venda', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id')->foreignId('empresa_id')->references('id')->on('empresa');
            $table->unsignedBigInteger('user_id')->foreignId('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('cupom_id')->foreignId('cupom_id')->references('id')->on('cupons');
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
        Schema::dropIfExists('pedidos_venda');
    }
}
