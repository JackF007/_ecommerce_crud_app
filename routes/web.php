<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\ProductsWebController;

Route::get('/prodotti', [ProductsWebController::class, 'index'])->name('prodotti.index');
Route::get('/aggiungi-prodotto', [ProductsWebController::class, 'create'])->name('aggiungi-prodotto');
Route::post('/store-prodotto', [ProductsWebController::class, 'store'])->name('store-prodotto');
Route::get('/modifica-prodotto/{product}', [ProductsWebController::class, 'edit'])->name('modifica-prodotto');
Route::put('/prodotto/{product}', [ProductsWebController::class, 'update'])->name('update-prodotto');
Route::delete('/rimuovi-prodotto/{product}', [ProductsWebController::class, 'destroy'])->name('rimuovi-prodotto');