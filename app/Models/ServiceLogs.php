<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceLogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'flag',
        'request',
        'response',
        'errors',
    ];
}
