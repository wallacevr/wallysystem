<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp_supplier', function (Blueprint $table) {
            $table->id();
            $table->string('sup_type');
            $table->string('person')->nullable();
            $table->string('name');
            $table->string('rg')->nullable();
            $table->string('cpf')->nullable();
            $table->string('cnpj')->nullable();
            $table->string('coop_name')->nullable();
            $table->string('fantasy')->nullable();
            $table->string('municipal_reg')->nullable();
            $table->string('state_reg')->nullable();
            $table->string('postal_code');
            $table->string('address');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('neighbourhood');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('telephoe');
            $table->string('cellphone');
            $table->string('emails');
            $table->string('notes')->nullable();
            $table->string('sup_ids')->nullable();
            $table->string('fantasy_cpf')->nullable(); 
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
        Schema::dropIfExists('sp_supplier');
    }
}
