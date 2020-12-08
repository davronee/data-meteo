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
