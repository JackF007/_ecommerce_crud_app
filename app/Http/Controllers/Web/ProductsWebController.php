<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Controllers\Controller;

/* Questo controller gestisce le operazioni CRUD con visualizzazione attraverso le Blade view 
   Si può decidere qui se visualizzare tramite blade view o stampare direttamente  le risposte json
   per ogni operazione. Basta commentare o meno le parti specifiche nei metodi*/

class ProductsWebController extends Controller
{
    // Metodo : mostra tutti i prodotti
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    // Metodo : mostra la form di creazione del prodotto
    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }
    
    // Metodo : salva un nuovo prodotto utilizzando la Custom Request Class
    public function store(ProductStoreRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            $data['image'] = $filename;
        }

        Product::create($data);

        //PER STAMPARE RISPOSTA JSON
        return response()->json([
            'messaggio' => 'Prodotto aggiunto con successo',
            'prodotto' => $data
        ]);
        
    //PER VISUALIZZAZIONE TRAMITE BLADE
        //return redirect(route('prodotti.index'))->with('success', 'Prodotto aggiunto con successo');
    }

    // Metodo: mostra la form di modifica del prodotto
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // Metodo: aggiorna un prodotto esistente utilizzando la Custom Request Class
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
       
    //PER STAMPARE RISPOSTA JSON
        return response()->json([
            'messaggio' => 'Prodotto aggiornato con successo',
            'prodotto' => $product
        ]);
    //PER VISUALIZZAZIONE TRAMITE BLADE
       // return redirect(route('prodotti.index'))->with('success', 'Prodotto aggiornato con successo');
    }

    
    // Metodo: eliminazione prodotto
    public function destroy(Product $product)
    {
        $deletedProduct = $product;

        $product->delete();
    
    //PER STAMPARE RISPOSTA JSON
        return response()->json([
            'messaggio' => 'Prodotto eliminato con successo',
            'prodotto' => $deletedProduct
        ]);
    //PER VISUALIZZAZIONE TRAMITE BLADE 
        //return redirect(route('prodotti.index'))->with('success', 'Prodotto eliminato con successo');
    }
}