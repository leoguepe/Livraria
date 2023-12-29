<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\AssuntoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RelatorioController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::resource('livros', LivroController::class);
Route::resource('autores', AutorController::class);
Route::resource('assuntos', AssuntoController::class);
Route::get('/relatorio-livros', [RelatorioController::class, 'gerarRelatorio'])->name('relatorio.livros');
