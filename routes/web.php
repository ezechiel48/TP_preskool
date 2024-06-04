<?php

use App\Http\Controllers\DepartementController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DepartementController::class, 'index'])->name('departement.add');
Route::get('/list', [DepartementController::class, 'index2'])->name('departement.list');
Route::get('/edit', [DepartementController::class, 'index3'])->name('departement.edit');
Route::get('departement/edit/{id}', [DepartementController::class, 'edit'])->name('departement.edit.edit');
Route::post('/departement', [DepartementController::class, 'save'])->name('departement.save');
Route::get('departement/delete/{id}', [DepartementController::class, 'delete'])->name('departement.delete');
Route::put('departement/update/{id}', [DepartementController::class, 'update'])->name('departement.update');
Route::get('departementmods/edit/{id}', [DepartementController::class, 'edit'])->name('departement.mods');


