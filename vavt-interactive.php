<?php
/**
 * Plugin Name: VAVT Interactive elements
 * Description: VPN Owners, Server location map and so on
 * Author:      Geroy Team
 * Version:     1.0
 */
namespace  vavt_interactive;

class VavtInteractive {


	public function __construct() {
		$this->register_plugin_options();
		$this->register_modules();
	}

	private function register_modules() {
		foreach(glob(__DIR__ . "/modules/*/register.php") as $file){
		  require_once $file;
		}
	}

	private function register_plugin_options() {
		require_once __DIR__ . '/inc/options_import.php';
	}

}

if ( ! defined( 'WPINC' ) ) {
	die;
}

$vavtInteractive = new VavtInteractive();