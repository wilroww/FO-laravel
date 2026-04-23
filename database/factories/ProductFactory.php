<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition(): array
    {
        $name = $this->faker->words(3, true);
        return [
            'name' => $name,
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->numberBetween(1, 999),
            'description' => $this->faker->sentence(12),
            'price' => $this->faker->randomFloat(2, 50, 3000),
            'category' => $this->faker->randomElement(['daily-care', 'fresh-breath', 'dental-tools']),
            'image' => 'images/products/placeholder.jpg',
            'rating' => $this->faker->randomElement(['4.2', '4.5', '4.8', '5.0']),
            'stock' => $this->faker->numberBetween(10, 200),
        ];
    }
}