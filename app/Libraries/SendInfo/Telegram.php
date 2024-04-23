<?php namespace App\Libraries\SendInfo;

use CurlFile;
use App\Libraries\SendInfo\SendInfoInterface;

class Telegram implements SendInfoInterface {

    protected $path;
    protected $chat_id;

    public function __construct($path, $chat_id = null) {
        $this->chat_id = "@gidromet_daily_info";
        $this->path = $path;
        if(!is_null($chat_id)) $this->chat_id = $chat_id;
    }

    protected function sendDocument() {
    	$botToken = "1431648419:AAHns8IHW3T0HJMwOyFWL_pdrtB0CMEZ1rQ";

		$post = array('chat_id' => $this->chat_id, 'document' => new CurlFile($this->path));
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"https://api.telegram.org/bot" . $botToken . "/sendDocument");
		curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec ($ch);
        curl_close ($ch);
        return $result;
    }

    public function send() {
        return $this->sendDocument();
    }
}
