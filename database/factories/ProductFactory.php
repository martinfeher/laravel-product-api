<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
            'product_number' => $this->faker->unique()->numberBetween(1, 999999),
            'excerpt' => $this->faker->paragraph(1, true),
            'description' => $this->faker->paragraph(2, true),
            'featured_image' => $this->faker->imageUrl(500, 600),
            'price' => $this->faker->randomFloat(2, 15, 200),
            'sale_price' => $this->faker->boolean(),
            'sale_price_value' => $this->faker->randomFloat(2, 1, 200),
            'stock_quantity' => $this->faker->numberBetween(0, 15),
            'reviews_allowed' => $this->faker->boolean(),
            'rating_items' => $this->faker->numberBetween(0, 12),
            'rating' => $this->faker->numberBetween(2, 5),
        ];
    
    }
}