<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTabelaUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('usu_codigo');
            $table->string('usu_nome');
            $table->string('usu_cpf');
            $table->string('usu_email')->unique();
            $table->string('usu_mae')->nullable();
            $table->string('usu_pai')->nullable();
            $table->date('usu_data_nascimento');
            $table->string('usu_telefone');
            $table->string('usu_cep');
            $table->string('usu_logradouro');
            $table->string('usu_numero');
            $table->string('usu_complemento')->nullable();
            $table->string('usu_bairro');
            $table->string('usu_cidade');
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
        Schema::dropIfExists('usuarios');
    }
}
