<?php

namespace App\Http\Controllers;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $isEmpty = Cart::isEmpty();
        return view('panier.index', compact('isEmpty'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $produit = Product::find($request->produit_id);

        if ($produit->quantite < $request->quantite) {

            return redirect()->back()->with('error', 'Nous n\'avons pas cette quantité en stock. Quantité disponible : ' .$produit->quantite);

        }
        Cart::add(array(
            'id' => $produit->id,
            'name' => $produit->nom,
            'price' => $produit->prix,
            'quantity' => $request->quantite,
            'attributes' => [
                'image' => $produit->image,
                'option_id' => $request->option_id
            ],
            'associatedModel' => $produit
        ));
        
        // return $request;
        return redirect()->back()->with('success', $request->quantite. ' x produit(s) ajouté(s) au panier');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Mise à jour de la quantité dans le panier
        Cart::update($id, [
            'quantity' => [
                'relative' => false, // On remplace la quantité par la nouvelle quantité
                'value' => $request->quantity,
            ],
        ]);

        // Redirection vers la page du panier avec un message de succès
        return redirect()->route('panier.index')->with('success', 'Panier mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Suppression de l'article du panier en fonction de son identifiant
        Cart::remove($id);

        // Rediriger vers la page du panier avec un message de succès
        return redirect()->back()->with('success', 'Produit supprimé du panier avec succès.');

    }
}
