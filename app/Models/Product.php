<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'slug',
        'description',
        'prix',
        'vedette',
        'quantite',
        'image',
        'active',
        'categorie_id',
    ];

    public function imageUrl()
    {
        return Storage::url($this->image);
    }
    
    // Formatage du prix en CFA
    public function formatedPrice()
    {
        return number_format($this->price, 0, ',', ' ') . ' Fcfa';
    }

    // Un produit appartient à une catégorie
    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    // Un produit peut avoir plusieurs commandes
    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'commande_produit');
    }

    // une option peut etre associé de 0 à plusieurs produits
    public function options()
    {
        return $this->belongsToMany(Option::class, 'option_product');
    }
}
