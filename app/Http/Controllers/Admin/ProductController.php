<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = 1;
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $options = Option::all();
        return view('admin.products.create', compact('categories', 'options'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'quantite' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,id',
            'options' => 'required|exists:options,id',
            'description' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // recuperer l'image
        $image = $request->image;

        // Créer un produit
        $produit = new Product();
        $produit->nom = $request->nom;
        $produit->slug = Str::slug($request->nom);
        $produit->prix = $request->prix;
        $produit->quantite = $request->quantite;
        $produit->categorie_id = $request->categorie_id;
        $produit->description = $request->description;
        $produit->active = $request->has('active') ? 1 : 0; // Par défaut à 0 si non coché;
        $produit->vedette = $request->has('vedette') ? 1 : 0; // Par défaut à 0 si non coché;
        $produit->image = $image->store('produits');
        $produit->save();

        // Attacher les options
        $produit->options()->attach($request->options);

        return redirect()->route('produits.index')->with('success', 'Produit créée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        $categories = Category::all();

        $options = Option::all();

        return view('admin.products.edit', compact('product','categories', 'options'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'quantite' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,id',
            'options' => 'required|exists:options,id',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $produit = Product::findOrFail($id);

        $produit->nom = $request->nom;
        $produit->slug = Str::slug($request->nom);
        $produit->prix = $request->prix;
        $produit->quantite = $request->quantite;
        $produit->categorie_id = $request->categorie_id;
        $produit->description = $request->description;
        $produit->active = $request->has('active') ? 1 : 0; // Par défaut à 0 si non coché
        $produit->vedette = $request->has('vedette') ? 1 : 0;

        // Vérifier si une nouvelle image a été uploadée
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($produit->image) {
                Storage::delete($produit->image);
            }

            // Enregistrer la nouvelle image
            $produit->image = $request->image->store('produits'); 
        }

        // Attacher les options
        $produit->options()->sync($request->options);

        $produit->save();

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        Storage::delete($product->image);

        $product->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
