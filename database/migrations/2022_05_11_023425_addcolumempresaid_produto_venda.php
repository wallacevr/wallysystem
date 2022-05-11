<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddcolumempresaidProdutoVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('sp_product_sale', function ($table) {
            $table->unsignedBigInteger('empresa_id')->foreignId('empresa_id')->references('id')->on('empresa')->default(1);

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
        Schema::table('sp_product_sale', function (Blueprint $table) {
            $table->dropColumn('empresa_id');

        });
    }
}
