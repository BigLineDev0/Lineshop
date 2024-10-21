<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;


    protected $fillable = [
        'reference',
        'total',
        'user_id',
        'adresse_livraison',
    ];

    // Une commande peut avoir plusieurs produits
    public function produits()
    {
        return $this->belongsToMany(Product::class, 'commande_produit')
                ->withPivot('quantite', 'prix', 'option');
    }
}
