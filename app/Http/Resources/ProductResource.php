<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'product_number' => $this->product_number,
            'description' => $this->description,
            'featured_image' => $this->featured_image,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
            'sale_price_value' => $this->sale_price_value,
            'stock_quantity' => $this->stock_quantity,
            'reviews_allowed' => $this->reviews_allowed,
            'rating_items' => $this->rating_items,
            'rating' => $this->rating,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s')
        ];
    }
}
