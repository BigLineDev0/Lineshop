<?php

namespace Database\Seeders;

use App\Models\Option;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $produits =  Product::all();

        $options = Option::pluck('id');

        foreach ($produits as $produit) {
            $produit->options()->attach($options);
        }
    }
}
