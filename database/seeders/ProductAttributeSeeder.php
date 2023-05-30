<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductAttribute;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $productAttributeNames = ['color', 'size', 'brand'];
        foreach($productAttributeNames as $item) {
            $productAttribute = New ProductAttribute;
            $productAttribute->name = $item;
            $productAttribute->save();
        }
    }
}
