<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductAttributeItem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductProductAttributeItem>
 */
class ProductProductAttributeItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::pluck('id')[$this->faker->numberBetween(1, Product::get()->count() -1)],
            'product_attribute_id' => ProductAttribute::pluck('id')[$this->faker->numberBetween(1, ProductAttribute::get()->count() -1)],
            'product_attribute_item_id' => ProductAttributeItem::pluck('id')[$this->faker->numberBetween(1, ProductAttributeItem::get()->count() -1)],
        ];
    }
}
