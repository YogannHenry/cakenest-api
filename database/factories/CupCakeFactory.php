<?php

namespace Database\Factories;

use App\Models\CupCake;
use Illuminate\Database\Eloquent\Factories\Factory;

class CupCakeFactory extends Factory
{
    protected $model = CupCake::class;

    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl(),
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 5, 20),
            'quantity' => $this->faker->numberBetween(0, 100),
            'is_available' => $this->faker->boolean(),
            'is_advertised' => $this->faker->boolean(),
        ];
    }
}
