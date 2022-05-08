<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpProductSale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_product_sale', function (Blueprint $table) {
            $table->id('product_sale_id');
            $table->string('product_sale_name');
            $table->string('product_sale_category');
            $table->string('product_sale_ncm');
            $table->string('product_sale_obs');
            $table->string('product_sale_group');
            $table->string('product_sale_character');
            $table->string('product_sale_color');
            $table->string('product_sale_code');
            $table->string('product_sale_family');
            $table->timestamps();
            $table->softDeletes();
        });
    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sp_product_sale');
    }
}
