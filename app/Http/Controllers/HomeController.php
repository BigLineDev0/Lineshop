<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // Récupérer les produits en vedette (limite à 4 par exemple)
        $featuredProducts = Product::where('vedette', true)->take(8)->get();

        return view('client.home', compact('featuredProducts'));
    }

    public function about()
    {
        return view('client.about');
    }

    public function contact()
    {
        return view('client.contact');
    }

    public function shop()
    {
        // Afficher les catégories
        $categories = Category::all();
        
        // Afficher les produits
        $produits = Product::latest()->paginate(8);

        return view('client.shop', compact('categories', 'produits'));
    }

    // filtrer les produits par catégories
    public function filtreByCategory(Request $request, $slug = null)
    {
        $categories = Category::all(); // Get all categories

        if ($slug) {
            $categorie = Category::where('slug', $slug)->first();

            $produits = Product::where('categorie_id', $categorie->id)->paginate(8); // Paginate the filtered products
        }
        else {
            // Sinon, récupérer tous les produits
            $categorie = null;
            $produits = Product::all();
        }
        return view('client.shop', compact('produits', 'categories', 'categorie'));
    }

    // Details du produit
    public function show($slug)
    {
        $produit = Product::with('category')->where('slug', $slug)->firstOrFail();

        $similarProducts = Product::where('categorie_id', $produit->categorie_id)
                                    ->where('id', '!=', $produit->id)
                                    ->take(4)
                                    ->get();
        return view('client.show', compact('produit', 'similarProducts'));
    }

}
