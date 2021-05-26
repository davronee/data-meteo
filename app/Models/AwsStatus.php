<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwsStatus extends Model
{
    use HasFactory;

    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = ['date', 'aws_id', 'status', 'is_published'];
    protected const AWSStatuses = [
        '0' => '<span class="fa fa-times-circle fa-2xx text-danger" data-toggle="tooltip" title="Носоз"></span>',
        '1' => '<span class="fa fa-check-circle fa-2xx text-success" data-toggle="tooltip" title="Соз"></span>',
        '-1' => '<span class="fa fa-question-circle fa-2xx text-warning" data-toggle="tooltip" title="Номаълум"></span>',
    ];

    public function aws()
    {
        return $this->belongsTo('App\AWS', 'aws_id', 'id');
    }

    public static function displayAwsStatus($date, $aws_id, $aws_statuses)
    {
        return isset($aws_statuses[$date][$aws_id]->status) ? self::AWSStatuses[$aws_statuses[$date][$aws_id]->status] : '';
    }

    public static function getAwsData($date, $aws_id, $aws_statuses)
    {
        return isset($aws_statuses[$date][$aws_id]->status) ? $aws_statuses[$date][$aws_id] : (object) [];
    }
}
