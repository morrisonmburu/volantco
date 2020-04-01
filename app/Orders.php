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
    public $timestamps = false;
    
    protected $fillable = [
        'to', 'from', 'package', 'info', 'time', 'mark', 'cancel', 'email', 'phone', 'instructions'
    ];
}
