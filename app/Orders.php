<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $timestamps = true;
    
    protected $fillable = [
        'category_id', 'user_id', 'sender_name', 'sender_phone', 'recipient_name', 'recipient_phone', 'truck_type_id', 'package_price', 'distance', 'stops_count', 'description', 'pickup_datetime', 'instructions', 'payment_id', 'status', 'device'
    ];
}
