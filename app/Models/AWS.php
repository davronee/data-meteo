<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AWS extends Model
{
    use HasFactory;

    protected $table = 'aws';
    protected $fillable = ['name', 'ugm_id'];
}
