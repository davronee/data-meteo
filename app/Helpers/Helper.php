<?php

// format numbers with leading zero
if (!function_exists('with_zero')) {
	function add_zero($num, $legnth) {
		return str_pad($num, $legnth, '0', STR_PAD_LEFT);
	}
}