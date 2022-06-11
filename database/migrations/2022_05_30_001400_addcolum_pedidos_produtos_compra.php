<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddcolumPedidosProdutosCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pedidos_produtos_compra', function ($table) {
            $table->decimal('total')->virtualAs('(qtd*valor)-desconto');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('pedidos_produtos_compra', function (Blueprint $table) {
            $table->dropColumn('total');

        });
    }
}
