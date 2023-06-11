<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    protected $fillasble=[
        'longitude',
        'Latitude',
        'city',
        'phone',
        'desc',
    ];

    protected $hidden=[

    ];


}
