<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AfganDb extends Model
{
    protected $connection = 'afgan_db';
    protected $table = 'data';
}
