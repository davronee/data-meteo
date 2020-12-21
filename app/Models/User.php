<?php

namespace App\Models;

use \Hash;
use Carbon\Carbon;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        // profile
        'fullname',
        'firstname',
        'lastname',
        'middlename',
        'phone',
        'stir',
        'pinfl',
        'passport',
        'passport_expire',
        'passport_address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * checks whether the user profile is filled or not.
     */
    public function profileIsFilled()
    {
        return !is_null($this->pinfl) && !is_null($this->passport) && !is_null($this->fullname);
    }

    public function isAdmin()
    {
        return $this->hasRole(['superadmin', 'admin']);
    }

    public function isStationShiftAgent()
    {
        return $this->hasRole(['shift-agent-station']);
    }

    /**
     * Mutators *****************************************************************************
     */

    public function setFirstnameAttribute($value)
    {
        $this->attributes['firstname'] = $value;
        $this->attributes['fullname'] = sprintf("%s %s %s", request()->lastname, request()->firstname, request()->middlename);
    }

    public function setPassportExpireAttribute($value)
    {
        $this->attributes['passport_expire'] = Carbon::parse($value)->format("Y-m-d");
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * accessors *****************************************************************************
     */

    public function getPassportExpireFormattedAttribute()
    {
        return Carbon::parse($this->passport_expire)->format('d.m.Y');
    }

    public function getFormattedPositionAttribute()
    {
        return $this->position->name;
    }

    /**
     * Relations *****************************************************************************
     */
    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }


}
