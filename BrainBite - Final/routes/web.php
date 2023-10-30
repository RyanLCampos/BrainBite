<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\CadastroController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\ProvaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\AnotacaoController;
use App\Http\Controllers\LandingPageController;

Route::middleware('auth')->group(function () {

  Route::middleware('Check')->group(function () {

    // Rotas que só o admin pode acessar
  });

  // USUARIOS
  Route::get('/usuarios', [UserController::class, 'index'])->name('user.index');
  Route::get('/usuarios/{id}/editar', [UserController::class, 'mostrarFormEditar'])->name('user.editar');
  Route::put('/usuarios/{id}', [UserController::class, 'atualizar'])->name('user.atualizar');
  Route::delete('/usuarios/{id}/excluir', [UserController::class, 'excluir'])->name('user.excluir');

  // Rotas para tarefas
  Route::get('/tarefas', [TarefaController::class, 'index'])->name('tarefas.index');
  Route::get('/tarefas/create', [TarefaController::class, 'create'])->name('tarefas.create');
  Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
  Route::get('/tarefas/{id}', [TarefaController::class, 'show'])->name('tarefas.show');
  Route::get('/tarefas/{id}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');
  Route::put('/tarefas/{id}', [TarefaController::class, 'update'])->name('tarefas.update');
  Route::delete('/tarefas/{id}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');

  // Rotas para provas
  Route::get('/provas', [ProvaController::class, 'index'])->name('provas.index');
  Route::get('/provas/create', [ProvaController::class, 'create'])->name('provas.create');
  Route::post('/provas', [ProvaController::class, 'store'])->name('provas.store');
  Route::get('/provas/{id}', [ProvaController::class, 'show'])->name('provas.show');
  Route::get('/provas/{id}/edit', [ProvaController::class, 'edit'])->name('provas.edit');
  Route::put('/provas/{id}', [ProvaController::class, 'update'])->name('provas.update');
  Route::delete('/provas/{id}', [ProvaController::class, 'destroy'])->name('provas.destroy');

  // Pagina inicial
  Route::get('/home', [HomeController::class, 'index'])->name('home.index');

  // Pagina Calendario
  Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario.index');

  // Paginas de horarios
  Route::get('/horarios', [HorarioController::class, 'index'])->name('horarios.index');
  Route::get('/horarios/create', [HorarioController::class, 'create'])->name('horarios.create');
  Route::post('/horarios', [HorarioController::class, 'store'])->name('horarios.store');
  Route::get('/horarios/{id}/edit', [HorarioController::class, 'edit'])->name('horarios.edit');
  Route::put('/horarios/{id}', [HorarioController::class, 'update'])->name('horarios.update');
  Route::delete('/horarios/{id}', [HorarioController::class, 'destroy'])->name('horarios.destroy');
  
  // Paginas de anotacoes
  Route::get('/anotacoes', [AnotacaoController::class, 'index'])->name('anotacoes.index');
  Route::get('/anotacoes/create', [AnotacaoController::class, 'create'])->name('anotacoes.create');
  Route::post('/anotacoes', [AnotacaoController::class, 'store'])->name('anotacoes.store');
  Route::get('/anotacoes/{id}', [AnotacaoController::class, 'show'])->name('anotacoes.show');
  Route::get('/anotacoes/{id}/edit', [AnotacaoController::class, 'edit'])->name('anotacoes.edit');
  Route::put('/anotacoes/{id}', [AnotacaoController::class, 'update'])->name('anotacoes.update');
  Route::delete('/anotacoes/{id}', [AnotacaoController::class, 'destroy'])->name('anotacoes.destroy');

  Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
  Route::get('/eventos/create', [EventoController::class, 'create'])->name('eventos.create');
  Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
  Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show');
  Route::get('/eventos/{id}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
  Route::put('/eventos/{id}', [EventoController::class, 'update'])->name('eventos.update');
  Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->name('eventos.destroy');
});

Route::get('/', [LandingPageController::class, 'index'])->name('landingpage');
Route::get('/login', [LoginController::class, 'mostrarFormLogin'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/cadastro', [CadastroController::class, 'mostrarFormCadastro'])->name('cadastro');
Route::post('/cadastro', [CadastroController::class, 'cadastro']);
