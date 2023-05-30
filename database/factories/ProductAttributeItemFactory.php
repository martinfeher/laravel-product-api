<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductAttribute;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductAttributeItems>
 */
class ProductAttributeItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $productAttribute = ProductAttribute::pluck('id')[$this->faker->numberBetween(0, ProductAttribute::get()->count()-1)];
        $sizeOptions = $this->faker->randomElement(['extra small', 'small', 'medium', 'large', 'extra large']);

        return [
            'name' => $productAttribute == 3 ? $sizeOptions : $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'product_attribute_id' => $productAttribute,
        ];
    }
}
