<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductsController extends Controller
{
    // Metodo per mostrare tutti i prodotti
    public function index(): JsonResponse
    {
        $products = Product::all();
        return response()->json($products);
    }

    // Metodo per mostrare un singolo prodotto
    public function show($id): JsonResponse
    {
        $product = Product::find($id);
    
        if (!$product) {
            return response()->json(['message' => 'Prodotto non trovato'], 404);
        }
    
        return response()->json($product);
    }
}

