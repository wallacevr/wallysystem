<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosProdutos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('empresa_id')->foreignId('empresa_id')->references('id')->on('empresa');
            $table->unsignedBigInteger('pedido_id')->foreignId('pedido_id')->references('id')->on('pedidos_venda');
            $table->unsignedBigInteger('product_sale_id')->foreignId('product_sale_id')->references('product_sale_id')->on('produtos_venda');
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
        Schema::dropIfExists('pedidos_produtos');
    }
}
