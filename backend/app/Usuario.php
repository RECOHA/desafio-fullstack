<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'usu_codigo';

    protected $fillable = [
        'usu_nome',
        'usu_cpf',
        'usu_email',
        'usu_mae',
        'usu_pai',
        'usu_data_nascimento',
        'usu_telefone',
        'usu_cep',
        'usu_logradouro',
        'usu_numero',
        'usu_complemento',
        'usu_bairro',
        'usu_cidade'
    ];
}
