<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'name' => $this->faker->word(),
            'total_amount' => $this->faker->randomFloat(2, 5, 20),
            'quantity' => $this->faker->numberBetween(0, 100),

        ];
    }
}
