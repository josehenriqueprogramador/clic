<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CicloController,
    AulaController,
    EncontroController,
    ProfessorController,
    LocalidadeController,
    TurmaController,
    AlunoController,
    ChamadaController
};

// Dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Recursos principais
Route::resources([
    'ciclos' => CicloController::class,
    'aulas' => AulaController::class,
    'encontros' => EncontroController::class,
    'localidades' => LocalidadeController::class,
    'turmas' => TurmaController::class,
    'alunos' => AlunoController::class,
    'chamadas' => ChamadaController::class,
]);

// Professor separado com singular correto
Route::resource('professores', ProfessorController::class)->parameters([
    'professores' => 'professor'
]);

