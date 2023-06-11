<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'address',
        'phone',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
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
    ];

    // orders
    public function outGoingOrders(){
        return $this->hasMany(Order::class,'sender_id');
    }

    public function inComingOrders(){
        return $this->hasMany(Order::class,'future_email','email');
    }

    // money transfer
    public function outGoingTrans(){
        return $this->hasMany(Remittance::class,'future_id');
    }

    public function inComingTrans(){
        return $this->hasMany(Remittance::class,'future_id');
    }

    
    // balance
    public function balance(){
        return $this->hasOne(Balance::class,'user_id');
    }

}
