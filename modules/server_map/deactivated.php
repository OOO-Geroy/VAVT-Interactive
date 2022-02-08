<?php
	//require_once(__DIR__ . '/inc/classes.php');

	//use vavt_interactive\modules\vpn_owners\JsonRoot;

	class VavtServerMap {

		const FILENAME = '/vpn-owners.json';
		
		function __construct() {
			add_action( 'rest_api_init', [$this, 'register_rest_route']);
			
			// $this->register_acf_fields();

			// add_action( 'wp_ajax_get_providers_data', [$this, 'get_providers_data']);
   //  		add_action( 'wp_ajax_nopriv_get_providers_data', [$this, 'get_providers_data']);
			// add_action( 'save_post', [$this, 'generate_file'], 10, 3);
			// add_shortcode( 'SHOW_VPN_OWNERS', [$this, 'display_shortcode']);

		}
		
		function display_shortcode() {
			wp_enqueue_style( 'interactive_vpn_owners.css', plugins_url( '/css/app.css', __FILE__ ));
			wp_enqueue_script( 'interactive_vpn_owners_chunk-vendor.js', plugins_url( '/lib/chunk-vendor.js', __FILE__ ));
			wp_enqueue_script( 'interactive_vpn_owners.js', plugins_url( '/lib/app.js', __FILE__ ));
			echo '<div class="owner-container"></div>';
		}

		function generate_json() {
			global $wpdb;
		
			$args = [
				'posts_per_page' => -1,
				//'fields' =>'post_name',
				'tax_query' => [
					[
						'taxonomy' => 'category',
						'field' => 'slug',
						'terms' => 'vpn-anbieter'
					]
				]
			];

			$query = new wp_query($args);
        	$provides = $query->posts;

        	//vpnstandortelaender
        	$countries = $wpdb->get_results(
        		"SELECT name as countryName, slug as countryCode  FROM $wpdb->terms as term
        		JOIN $wpdb->term_taxonomy AS term_tax ON term_tax.term_id = term.term_id
        		--WHERE term_tax.taxonomy='vpnstandortelaender'
        		");
			return new WP_REST_Response($countries, 200);
		}

		function register_rest_route() {
			register_rest_route( 'vavt-interactive/v1', '/server_map_json', [
				'methods' => 'GET',
				'callback' => [$this, 'generate_json']
			]);
		}
	}

$vavtServerMap = new VavtServerMap();