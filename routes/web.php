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
Route::get('/relatorios', [RelatorioController::class, 'index'])->name('relatorios.index');
Route::get('/relatorios/download', [RelatorioController::class, 'download'])->name('relatorios.download');
