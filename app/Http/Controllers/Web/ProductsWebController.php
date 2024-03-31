<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Controllers\Controller;

/* Questo controller gestisce le operazioni CRUD con visualizzazione attraverso le Blade view */

class ProductsWebController extends Controller
{
    // Mostra tutti i prodotti
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    // Mostra la form di creazione del prodotto
    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }
    
    // Salva un nuovo prodotto utilizzando la Custom Request Class
    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            $data['image'] = $filename;
        }

        Product::create($data);
        return redirect(route('prodotti.index'))->with('success', 'Prodotto aggiunto con successo');
    }

    // Mostra la form di modifica del prodotto
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Aggiorna un prodotto esistente utilizzando la Custom Request Class
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            $data['image'] = $filename;
        }
      
     \Log::info($data);

        $product->update($data);
        return redirect(route('prodotti.index'))->with('success', 'Prodotto aggiornato con successo');
    }

    // Metodo per eliminare un prodotto
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('prodotti.index'))->with('success', 'Prodotto eliminato con successo');
    }
}