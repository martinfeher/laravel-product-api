<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function productAttributeItems()
    {
        return $this->hasMany(ProductAttributeItem::class, 'product_attribute_id');
    }


    public function productAttributeItemShort()
    {
        return $this->productAttributeItem()->select(['id', 'name', 'created_at'])->get();
    }



}
