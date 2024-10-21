<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable =[
        'libelle'
    ];

    public function produits()
    {
        return $this->belongsToMany(Product::class, 'option_product');
    }
}
