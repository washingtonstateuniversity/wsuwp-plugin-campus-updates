<?php namespace WSUWP\Plugin\Campus_Updates;


class Plugin {


	protected static $version = '1.0.0';


	public function init() {

		require_once __DIR__ . '/include-post-type-campus-update.php';
		require_once __DIR__ . '/include-shortcode-campus-update.php';

	}


	public static function get_version() {

		return self::$version;

	}


	public static function get_plugin_dir() {

		return dirname( __DIR__ );

	}


}

(new Plugin)->init();
