<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'slug',
        'image',
    ];

    //utliser le slug pour les category
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->libelle);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->libelle);
        });
    }

    // Une catégorie peut avoir plusieurs produits
    public function products()
    {
        return $this->hasMany(Product::class, 'categorie_id');
    }
}
