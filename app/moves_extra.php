<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class moves_extra extends Model
{
    protected $table = 'moves_extra';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
        'order_id', 'house_type_id', 'rooms_count', 'type_of_rooms', 'pcp', 'other_services'
    ];
}
