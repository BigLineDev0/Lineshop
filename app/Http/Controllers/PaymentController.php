<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function payement($reference)
    {
        $commande = Commande::where('reference', $reference)->first();

        if (empty($commande)) {
            return redirect('/');
        }

        return view('paiements.index', compact('commande'));
    }
}
