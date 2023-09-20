<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivrosController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('login');
});



Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/livros', [LivrosController::class, 'index'])->middleware('auth.basic');
Route::get('/livros/novo', [LivrosController::class, 'create'])->middleware('auth.basic');
Route::post('/livros/novo', [LivrosController::class, 'store'])->middleware('auth.basic');

Route::get('/livros/delete/{id}', [LivrosController::class, 'destroy'])->middleware('auth.basic');

Route::get('/livros/editar/{id}', [LivrosController::class, 'edit'])->middleware('auth.basic');
Route::post('/livros/editar/', [LivrosController::class, 'update'])->middleware('auth.basic');


Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __dir__.'/auth.php';
