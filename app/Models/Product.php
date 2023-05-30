<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\OrderItem;
use App\Models\ProductCategory;

class product extends Model
{
    use HasFactory, SoftDeletes;


     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'product_number',
        'excerpt',
        'description',
        'featured_image',
        'price',
        'sale_price',
        'sale_price_value',
        'stock_quantity',
        'reviews_allowed',
        'rating_items',
        'rating',
    ];

    /**
     * HasMany relationship to retrieve OrderItems 
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }

    public function productCategories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_product_category');
    }

    public function ProductTags()
    {
        return $this->belongsToMany(ProductTag::class, 'product_product_tag');
    }

    public function productAttributes()
    {
        return $this->belongsToMany(ProductAttribute::class, 'product_product_attribute');
    }

    public function productProductCategories()
    {
        return $this->hasMany(ProductProductCategory::class, 'product_id');
    }

    public function productProductTags()
    {
        return $this->hasMany(productProductTag::class, 'product_id');
    }

    public function productProductAttributeItems()
    {
        return $this->hasMany(ProductProductAttributeItem::class, 'product_id');
    }
    
}