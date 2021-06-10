<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'location_id', 'name', 'address', 'latitude', 'longitude', 'order_id', 'is_stopover', 'is_destination'
    ];
}
