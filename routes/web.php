<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategoryController;

Route::get('/', [LivreController::class, 'index'])->name('livres.index');
Route::get('/livres/create',[LivreController::class,'create'])->name('livres.create');
Route::post('/livres/store', [LivreController::class, 'store'])->name('livres.store');

Route::get('/livres/edit/{livre}',[LivreController::class,'edit'])->name('livres.edit');
Route::put('/livres/update/{livre}',[LivreController::class,'update'])->name('livres.update');

Route::delete('/livres/delete/{livre}',[LivreController::class,'destroy'])->name('livres.destroy');

Route::get('/livres/create', [CategoryController::class, 'create'])->name('livres.create');


Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');




