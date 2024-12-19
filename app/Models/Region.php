<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = "uz_regions";

    protected $fillable = ['nameUz','nameRu'];


    // scopes
    public function scopeWhereUserRegion($query, $region_id)
    {
        if(!is_null($region_id) && $region_id != 17)
            return $query->where('regionid', $region_id);
    }
}
