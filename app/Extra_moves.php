<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra_moves extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'order_id', 'house_type_id', 'rooms_count', 'type_of_rooms', 'pcp', 'other_services'
    ];
}
