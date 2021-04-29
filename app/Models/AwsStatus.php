<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwsStatus extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'aws_id', 'status'];
    protected const AWSStatuses = [
        '0' => 'Носоз',
        '1' => 'Соз',
        '-1' => 'Номаълум',
    ];

    public function aws()
    {
        return $this->belongsTo('App\AWS', 'aws_id', 'id');
    }

    public static function displayAwsStatatus($aws_id, $aws_statuses)
    {
        return isset($aws_statuses[$aws_id]->status) ? self::AWSStatuses[$aws_statuses[$aws_id]->status] : '';
    }
}
