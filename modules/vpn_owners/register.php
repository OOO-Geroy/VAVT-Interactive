<?php
	require_once(__DIR__ . '/inc/classes.php');

	use vavt_interactive\modules\vpn_owners\JsonRoot;

	class VavtVpnOwners {

		const FILENAME = '/vpn-owners.json';
		
		function __construct() {
			$this->register_acf_fields();

			add_action( 'wp_ajax_get_providers_data', [$this, 'get_providers_data']);
    		add_action( 'wp_ajax_nopriv_get_providers_data', [$this, 'get_providers_data']);
			add_action( 'acf/save_post', [$this, 'generate_file'], 20);
			add_shortcode( 'VAVT_VPN_OWNERS', [$this, 'display_shortcode']);
		}


		function get_providers_data() {
			wp_send_json(json_decode(file_get_contents(K8_PATH_LOC . self::FILENAME)));
		} 
		
		
		function display_shortcode() {
			wp_enqueue_style( 'interactive_vpn_owners.css', plugins_url( '/css/app.css', __FILE__ ));
			wp_enqueue_script( 'interactive_vpn_owners_chunk-vendor.js', plugins_url( '/lib/chunk-vendor.js', __FILE__ ));
			wp_enqueue_script( 'interactive_vpn_owners.js', plugins_url( '/lib/app.js', __FILE__ ));
			echo '<div class="owner-container"></div>';
		}

		function generate_file($id) {
			$screen = get_current_screen();
			if ($screen->id == 'toplevel_page_vavt-vpn-owners') {
				$owners = get_field('k8_vpno_owners', 'vavt-vpn-owners') ;
				if(is_null($owners)) return false;
				$json = new JsonRoot($owners);
				file_put_contents(K8_PATH_LOC . self::FILENAME, json_encode($json));
			}
		}

		function register_acf_fields() {
			/** Contains function which import fields */
			require_once __DIR__ . '/inc/fields.php';
		}
	}

$vpnOwners = new VavtVpnOwners();