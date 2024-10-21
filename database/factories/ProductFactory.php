<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nom = $this->faker->sentence(3);

        return [
            'nom' => $nom,
            'slug' => Str::slug($nom),
            'description' => $this->faker->paragraph(),
            'prix' => rand(500, 3000),
            'vedette' => $this->faker->boolean(),
            'quantite' => rand(5, 30),
            'image' => $this->faker->imageUrl($width = 640, $height = 480, 'nature'),
            'active' => $this->faker->boolean(),
            'categorie_id' => rand(1, 4),
        ];
    }
}
