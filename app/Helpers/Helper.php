<?php

// format numbers with leading zero
if (!function_exists('with_zero')) {
	function with_zero($num, $legnth) {
		return str_pad($num, $legnth, '0', STR_PAD_LEFT);
	}
}

// generate password with provided length
if (!function_exists('random_password')) {
	function random_password( $length = 8 ) {
	    $chars = "0123456789";
	    $password = substr( str_shuffle( $chars ), 0, $length );
	    return $password;
	}
}

// emit event to socket.io
if (!function_exists('custom_emit')) {
	function custom_emit($event, $data) {
        $url_with_port = 'http://localhost:3001/emit/%s';
        $data_string = json_encode($data);

        $ch = curl_init(sprintf($url_with_port, $event));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // server waits json request                                                                    //
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string)
            ]
        );

        curl_setopt($ch, CURLOPT_TIMEOUT, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
