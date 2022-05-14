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
        Schema::create('alunos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->date('data_nasc');
            $table->string('idade');
            $table->enum('sexo', ['Masculino', 'Feminino']);
            $table->string('endereco', 150)->nullable();
            $table->string('bairro', 70)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('complemento', 100)->nullable();
            $table->string('cidade', 70)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('email')->nullable();
            $table->string('cep')->nullable();
            $table->string('telefone')->nullable();
            $table->enum('esporte', ['Futebol', 'Karatê','Jiu-jitsu','Basquete','Handebol']);
            $table->enum('musica', ['Musicalização Infantil', 'Flauta','Violão','Coral']);
            $table->enum('danca', ['Ballet', 'Capoeira']);
            $table->text('foto')->nullable();
            $table->string('nome_mae', 100);
            $table->string('profissao_mae');
            $table->string('cpf_mae');
            $table->string('telefone_mae');
            $table->string('nome_pai', 100);
            $table->string('profissao_pai');
            $table->string('cpf_pai');
            $table->string('telefone_pai');
            $table->string('escola');
            $table->string('serie');
            $table->string('turma');
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
        Schema::dropIfExists('alunos');
    }
};
