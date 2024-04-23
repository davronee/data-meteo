<?php namespace App\Libraries\SendInfo;

use App\Libraries\SendInfo\SendInfoInterface;

class SendInfo {
    public function __construct(SendInfoInterface $sendProvider)
    {
        return $sendProvider->send();
    }


}
