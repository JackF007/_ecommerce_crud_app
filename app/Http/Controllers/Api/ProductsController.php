<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

/* Questo controller gestisce i metodi CRUD con risposte JSON */

class ProductsController extends Controller
{
    // Metodo per restituire tutti i prodotti in formato JSON
    public function index(): JsonResponse
    {
        $products = Product::all();
        return response()->json($products);
    }

    //Metodo per restituire un prodotto specifico in formato JSON
    public function show($id): JsonResponse
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json(['message' => 'Prodotto non trovato'], 404);
        }
    
        return response()->json($product);
    }
}
