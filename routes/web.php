<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunosController;


Route::get('/', function () {
    return view('layout.index');
    
});


Route::get('/alunos', [AlunosController::class, 'index'])->name('alunos');
Route::get('/alunos/novo', [AlunosController::class, 'novo'])->name('alunos.novo');
Route::post('/alunos/salvar', [AlunosController::class, 'salvar'])->name('alunos.salvar');
Route::get('/alunos/editar/{id}', [AlunosController::class, 'editar'])->name('alunos.editar');
Route::get('/alunos/deletar/{id}', [AlunosController::class, 'deletar'])->name('alunos.deletar');
