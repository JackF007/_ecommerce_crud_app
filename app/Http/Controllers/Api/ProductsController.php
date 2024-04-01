<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductsController extends Controller
{
    // Metodo: mostra tutti i prodotti in Json
    public function index(): JsonResponse
    {
        $products = Product::all();
        return response()->json($products);
    }

    // Metodo: mostra un singolo prodotto in Json
    public function show($id): JsonResponse
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json(['message' => 'Prodotto non trovato'], 404);
        }
    
        return response()->json($product);
    }
}