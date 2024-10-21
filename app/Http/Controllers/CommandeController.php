<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Product;
use App\Models\User;
use App\Notifications\NouvelleCommande;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class CommandeController extends Controller
{
    //
    public function checkout()
    {
        return view('commandes.index');
    }

    public function validatedCheckout(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:150',
            'email' => 'required|email',
            'telephone' => 'required|string|max:20',
            'adresse_de_livraison' => 'required|string|max:150'
        ]);

        $paniers = Cart::getContent();

        $commande = new Commande();

        $commande->reference = rand(100000, 900000);
        $commande->total = Cart::getTotal();
        $commande->user_id = Auth::user()->id ;
        $commande->adresse_livraison = $request->adresse_de_livraison;
        $commande->save();
        
        foreach($paniers as $panier)
        {
            $commande->produits()->attach($panier->id,
                [
                    'quantite' => $panier->quantity, 
                    'prix' => $panier->price,
                    'option' => $panier->attributes->option_id
                ]
            );

            $produit = Product::find($panier->id);

            $produit->quantite -= $panier->quantity;

            Cart::clear();

            if ($request->type_de_paiement == 'livraison') {
                //Notification à l'administrateur
                // $admin = User::where('role', 'admin')->get();

                // Notification::send($admin, new NouvelleCommande());

                return redirect()->route('confirm');
                
            } else {
                return redirect()->route('payement', $commande->reference);
            }
        
        }
    }

    public function confirm()
    {
        return view('commandes.confirm');
    }
}
