<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_usuario')->unique();
            $table->string('nome_completo');
            $table->string('cpf')->unique();
            $table->string('rg')->nullable();
            $table->date('data_nascimento');
            $table->string('email')->unique();
            $table->text('endereco');
            $table->string('telefone_celular');
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
        Schema::dropIfExists('clientes');
    }
};
