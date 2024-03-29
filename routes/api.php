
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductsController;




Route::get('/products', [ProductsController::class, 'index'])->name('api.products');
Route::get('/mostra-prodotto/{product}', [ProductsController::class, 'show'])->name('api.mostra-prodotto');
