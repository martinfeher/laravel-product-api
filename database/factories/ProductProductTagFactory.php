<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductTag;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductProductTag>
 */
class ProductProductTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::pluck('id')[$this->faker->numberBetween(1, Product::get()->count()-1)],
            'product_tag_id' => $this->faker->numberBetween(1, 12),
            // 'product_tag_id' => ProductTag::pluck('id')[$this->faker->numberBetween(1, ProductTag::get()->count()-1)],
        ];
    }
}
