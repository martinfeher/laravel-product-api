<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order;
use App\Models\Promocode;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'first_name', 
         'last_name', 
         'email', 
         'phone_number',
         'promocode_id'
    ];


    /**
     * The relationships that should always be loaded.
     * date_last_order load as the attribute of a Customer model
     *
     * @var array
     */
    protected $appends = ['date_last_order'];

    /**
     * BelongsTo relationship to retrieve Promocode
     */
    public function promocode()
    {
        return $this->belongsTo(Promocode::class, 'promocode_id');
    }

    /**
     * HasMany relationship to retrieve Orders
     */
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Retrieve date_last_order the data of the last order for a Customer
     */

    public function getDateLastOrderAttributes()
    {

        $date_last_order = $this->hasMany(Order::class)->orderBy('created_at', 'desc')->limit(1);
        
        return $date_last_order->exists() ? $date_last_order->first()->created_at->format('Y-m-d H:i:s') : '';
    
    }

}