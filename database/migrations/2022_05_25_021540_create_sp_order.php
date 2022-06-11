<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id')->foreignId('supplier_id')->references('id')->on('sp_supplier');       
            $table->decimal('total');
            $table->decimal('desconto');
            $table->decimal('frete');
            $table->unsignedBigInteger('empresa_id')->foreignId('empresa_id')->references('id')->on('empresa');
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
        Schema::dropIfExists('sp_order');
    }
}
