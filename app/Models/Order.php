<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Customer;
use App\Models\Product;
use App\Models\OrderItem;


class Order extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id',
    ];

    /**
     * BelongsTo relationship to retrieve Customer 
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * retrieve attribute order customer full name 
     */
    public function getCustomerFullNameAttribute()
    {
        
        $customer = $this->belongsTo(Customer::class, 'customer_id');

        return $customer->exists() ? $customer->first()->first_name . " " . $customer->first()->last_name  : '';

    }

    /**
     * belongsToMany relationship to retrieve Products via order_item pivot table
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_item', 'order_id', 'product_id');
    }

    /**
     * Retrieve order items with quantity
     */

    public function orderItems()
    {
         return $this->belongsToMany(Product::class, 'order_item', 'order_id', 'product_id')
            ->using(OrderItem::class)
            ->withPivot(['quantity']);
    }

}