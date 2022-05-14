<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'data_nasc',
        'idade',
        'sexo',
        'cep',
        'endereco',
        'bairro',
        'numero',
        'complemento',
        'cidade',
        'uf',
        'email',
        'telefone',
        'esporte',
        'musica',
        'danca',
        'foto',
        'nome_mae',
        'profissao_mae',
        'cpf_mae',
        'telefone_mae',
        'nome_pai',
        'profissao_pai',
        'cpf_pai',
        'telefone_pai',
        'escola',
        'serie',
        'turma'
       
    ];
}
