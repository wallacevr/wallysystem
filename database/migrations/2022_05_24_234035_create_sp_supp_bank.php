<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpSuppBank extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_supp_bank', function (Blueprint $table) {
            $table->id();
            $table->string('s_b_id'); 
            $table->string('bbank');
            $table->string('agency'); 
            $table->string('digit'); 
            $table->string('amount');
            $table->string('digit_amount'); 
            $table->string('type'); 
            $table->unsignedBigInteger('sup_id')->foreignId('sup_id')->references('id')->on('sp_supplier');
            $table->string('type_acc'); 
            $table->string('b_favorecido');
            $table->string('b_cpf'); 
            $table->unsignedBigInteger('empresa_id')->foreignId('empresa_id')->references('id')->on('empresa');   
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
        Schema::dropIfExists('sp_supp_bank');
    }
}
