<?php
/**
Plugin Name: PHPMailer Quickfix
Description: Quick fix for for CVE-2016-10045 and CVE-2016-10033, use it while WordPress is still not updated
Author: WPML
Author URI: http://wpml.org
Version: 1.0
 */

add_filter('wp_mail_from', 'quickfix_from');

add_filter('wp_mail_from_name', 'quickfix_from_name');

function quickfix_from($from) {
	if (!is_email($from)) {
		$sitename = strtolower( $_SERVER['SERVER_NAME'] );
		if ( substr( $sitename, 0, 4 ) == 'www.' ) {
			$sitename = substr( $sitename, 4 );
		}

		$from = 'wordpress@' . $sitename;
	}

	return $from;
}

function quickfix_from_name($name) {

	return 'WordPress';
}