<?php

	class VavtShortcodes {
		
		function __construct() {
			$this->register_classes();
		}

		private function register_classes() {
			foreach(glob(__DIR__ . "/inc/*/index.php") as $file){
			  require_once $file;
			}
	    }

	}

$shortcodes = new VavtShortcodes();