<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuickInfo extends Model
{
    use HasFactory, Notifiable;

    protected const MAILS = [
        '1735' => 'amsgnukus@meteo.uz',
        '1722' => 'ugmtermez@meteo.uz',
        '1724' => 'ugmgulistan@meteo.uz',
        '1710' => 'ugmkarshi@meteo.uz',
        '1733' => 'ugmurgench@meteo.uz',
        '1703' => 'ugmandijan@meteo.uz',
        '1708' => 'ugmdjizak@meteo.uz',
        '1718' => 'ugmsamarkand@meteo.uz',
        '1712' => 'ugmnavoi@meteo.uz',
        '1730' => 'ugmfrgn@meteo.uz',
        '1714' => 'ugmnamangan@meteo.uz',
        '1706' => 'ugmbuhara@meteo.uz',
        '1727' => 'ugmtashkent@meteo.uz',
        '1726' => 'uhydromet@meteo.uz',
    ];

    protected $fillable = ['region_id', 'date', 'info', 'is_published', 'user_id'];
    protected $dates = ['created_at', 'updated_at', 'date'];

    public function routeNotificationForMail($notification)
    {
        // Return email address only
        $mailsToSend = [
            'abror9109@gmail.com',
            'foruhb@gmail.com',
            'mtb@meteo.uz'
        ];

        // $mailsToSend[] = self::MAILS[$this->region_id];

        return $mailsToSend;
    }

    public function isPublished()
    {
        return $this->is_published;
    }

    public function getFormattedRegionAttribute()
    {
        return $this->region->nameUz;
    }

    public function getFormattedAuthorAttribute()
    {
        return $this->user->fullname;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Region', 'region_id', 'regionid');
    }


}
