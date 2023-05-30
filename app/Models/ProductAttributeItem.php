<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttributeItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'attribute_id',
        'name',
        'description'
    ];

    public function productProductAttributeItems()
    {
        return $this->hasMany(ProductProductAttributeItem::class, 'product_attribute_item_id');
    }


    public function count()
    {
        return $this::productProductAttributeItem()->where('product_attribute_item_id', $this->id)->where('product_attribute_id', $this->product_attribute_id)->count();
    }


}
