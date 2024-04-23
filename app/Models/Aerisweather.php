<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aerisweather extends Model
{
    use HasFactory;


    protected $casts = [
        'datetime' => 'date'
    ];
}
