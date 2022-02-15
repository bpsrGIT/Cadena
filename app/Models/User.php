<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'is_admin',
        'user_type',
        'name',
        'company_name',
        'email',
        'password',
        'mobile_number',
        'landline_number',
        'street_address',
        'city_address',
        'provincial_address',
        'zip_code',
        'purpose_for_biking',
        'comfortable_position',
        'three_months_objective',
        'my_wishlist' => [],
        'my_listings' => [],
        'registered_dealers' => []
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'is_admin',
        'user_type',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'my_wishlist' => 'array',
        'my_listings' => 'array'
    ];
}
