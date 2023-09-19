<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/livros', [LivrosController::class, 'index'])->middleware('auth.basic');
Route::get('/livros/novo', [LivrosController::class, 'create'])->middleware('auth.basic');
Route::post('/livros/novo', [LivrosController::class, 'store'])->middleware('auth.basic');

Route::get('/livros/delete/{id}', [LivrosController::class, 'destroy'])->middleware('auth.basic');

Route::get('/livros/editar/{id}', [LivrosController::class, 'edit'])->middleware('auth.basic');
Route::post('/livros/editar/', [LivrosController::class, 'update'])->middleware('auth.basic');

