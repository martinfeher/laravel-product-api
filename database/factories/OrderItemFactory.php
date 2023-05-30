<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItems>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => Order::pluck('id')[$this->faker->numberBetween(1, Order::get()->count()-1)],
            'product_id' => Product::pluck('id')[$this->faker->numberBetween(1, Product::get()->count()-1)],
            'quantity' => $this->faker->numberBetween(1, 25),
        ];
    }
}
