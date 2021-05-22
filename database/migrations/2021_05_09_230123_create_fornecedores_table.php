<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id('sup_id');
            $table->integer('sup_type');
            $table->string('person', 200);
            $table->string('name', 200);
            $table->decimal('rg', 20);
            $table->decimal('cpf', 19);
            $table->string('cnjp', 19);
            $table->string('coop_name', 500);
            $table->string('fantasy', 500);
            $table->decimal('municipal_reg', 1000);
            $table->decimal('state_reg', 100);
            $table->decimal('postal_code', 100);
            $table->string('address', 1000);
            $table->decimal('number', 1000);
            $table->string('complement', 20000);
            $table->string('neighbourhood', 1000);
            $table->string('city', 50);
            $table->string('state', 50);
            $table->string('country', 20);
            $table->decimal('telephoe', 14);
            $table->decimal('cellphone', 14);
            $table->string('emails', 20);
            $table->string('notes', 500);
            $table->integer('sup_ids');
            $table->string('fantasy_cpf', 200);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fornecedores');
    }
}