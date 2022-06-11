<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_end');
            $table->string('cep');
            $table->string('endereco');
            $table->string('num');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->unsignedBigInteger('state_id')->foreignId('state_id')->references('id')->on('state')->constrained();
            $table->unsignedBigInteger('city_id')->foreignId('city_id')->references('id')->on('cities')->constrained();
            $table->string('pais');
            $table->string('tel')->nullable();
            $table->string('cel');
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
        Schema::dropIfExists('endereco_fat_compra');
    }
}
