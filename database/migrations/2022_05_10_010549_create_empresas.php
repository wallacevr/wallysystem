<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->id();
            $table->string('cnpj');
            $table->string('razaosocial');
            $table->string('email');
            $table->string('ie');
            $table->string('ccm');
            $table->string('cep');
            $table->string('endereco');
            $table->string('num');
            $table->string('complemento');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('uf');
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
        Schema::dropIfExists('empresa');
    }
}
