<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'libelle' => 'Fruits',
            'image' => 'fruit.jpg',
        ]);

        Category::create([
            'libelle' => 'Jus',
            'image' => 'jus.jpg',
        ]);

        Category::create([
            'libelle' => 'Légumes',
            'image' => 'legume.jpg',
        ]);

        Category::create([
            'libelle' => 'Séché',
            'image' => 'seche.jpg',
        ]);
    }
}
