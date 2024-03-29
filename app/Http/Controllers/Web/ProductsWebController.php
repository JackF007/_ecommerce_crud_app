<?php

namespace App\Http\Controllers\Web;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/* Questo controller gestisce le operazioni CRUD con visualizzazione attraverso le Blade view */

class ProductsWebController extends Controller
{

    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    // Metodo per mostrare la form di creazione del prodotto
    public function create()
    {
        return view('products.create');
    }
    
    // Metodo per salvare un nuovo prodotto
    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required',
            'qnt' => 'required|numeric',
            'prezzo' => 'required|numeric',
            'descrizione' => 'nullable',
            'image' => 'nullable|image|max:1999'
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            $data['image'] = $filename;
        }

        Product::create($data);
        return redirect(route('prodotti.index'))->with('success', 'Prodotto aggiunto con successo');
    }

    // Metodo per mostrare la form di modifica del prodotto
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Metodo per aggiornare un prodotto esistente
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'nome' => 'required',
            'qnt' => 'required|numeric',
            'prezzo' => 'required|numeric',
            'descrizione' => 'nullable',
            'image' => 'nullable|image|max:1999'
        ]);

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
            $data['image'] = $filename;
        }

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
