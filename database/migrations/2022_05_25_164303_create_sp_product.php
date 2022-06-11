<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_product', function (Blueprint $table) {
            $table->id();
            $table->string('prod_name');
            $table->string('prod_category');
            $table->string('prod_unit');
            $table->string('prod_ncm');
            $table->string('prod_note');
            $table->unsignedBigInteger('product_sale_id')->foreignId('product_sale_id')->references('product_sale_id')->on('produtos_venda')->nullable();
            $table->unsignedBigInteger('empresa_id')->foreignId('empresa_id')->references('id')->on('empresa');
            $table->softDeletes();
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
        Schema::dropIfExists('sp_product');
    }
}
