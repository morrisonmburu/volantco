<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Couriers extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'phoneNo', 'email', 'licenseNo', 'vehicle_type', 'vehicle_model', 'vehicle_color', 'vehicle_platenumber', 'production_year', 'boardNo', 'number_of_passangers', 'status', 'driver_avatar', 'vehicle_avatar', 'token', 'password', 'category', 'is_online', 'is_special'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
