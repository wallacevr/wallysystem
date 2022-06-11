<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosProdutosCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_produtos_compra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id')->foreignId('empresa_id')->references('id')->on('empresa');
            $table->unsignedBigInteger('order_id')->foreignId('order_id')->references('order_id')->on('sp_order');
            $table->unsignedBigInteger('product_id')->foreignId('product_id')->references('id')->on('sp_product');
            $table->integer('qtd');
            $table->decimal('valor');
            $table->decimal('desconto');
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
        Schema::dropIfExists('pedidos_produtos_compra');
    }
}
