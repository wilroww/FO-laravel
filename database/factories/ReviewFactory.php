<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    protected $model = \App\Models\Review::class;

    public function definition(): array
    {
        return [
            'user_id'    => null,
            'guest_name' => $this->faker->firstName(),
            'rating'     => $this->faker->numberBetween(3, 5),
            'comment'    => $this->faker->sentence(12),
            'approved'   => true,
        ];
    }
}