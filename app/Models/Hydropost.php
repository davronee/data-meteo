<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hydropost extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'longitude', 'latitude', 'region_id', 'district_id'];

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id','regionid');
    }

    // District munosabati
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id','areaid');
    }
}
