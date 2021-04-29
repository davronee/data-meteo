<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UGM extends Model
{
    use HasFactory;

    protected $table = 'ugms';

    public static function isCreated($ugm_name)
    {
        return self::where('name', $ugm_name)->count();
    }

    public function aws(): HasMany
    {
        return $this->hasMany(AWS::class, 'ugm_id', 'id');
    }
}
