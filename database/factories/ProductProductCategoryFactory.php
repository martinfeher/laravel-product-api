<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductProductCategory>
 */
class ProductProductCategoryFactory extends Factory
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
            'product_category_id' => ProductCategory::pluck('id')[$this->faker->numberBetween(1, ProductCategory::get()->count()-1)],
        ];
    }
}
