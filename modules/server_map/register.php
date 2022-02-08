<?php
require_once(__DIR__ . '/inc/classes.php');

use vavt_interactive\modules\server_map\Provider;

class VavtServerMap
{

	const COUNTRY_TAXONOMY = 'vpnstandortelaender';

	function __construct()
	{
		$this->register_acf_fields();
		add_action('rest_api_init', [$this, 'register_rest_route']);
		add_shortcode('VAVT_SERVER_MAP', [$this, 'display_shortcode']);
	}

	function display_shortcode()
	{
		$iframe_path = plugins_url('/dist/index.html', __FILE__);
		return '<iframe class="k8_acf_ifr_url" style="width:100%; height: 800px;" src="' . $iframe_path . '"></iframe>';
	}

	function enqueue_files()
	{
		wp_enqueue_style('interactive_server_map_fontawesome.css', "https://use.fontawesome.com/releases/v5.0.13/css/all.css");
		wp_enqueue_style('interactive_server_map_font.css', "https://fonts.googleapis.com/css2?family=Roboto&display=swap");
		wp_enqueue_style('interactive_server_map.css', plugins_url('/css/app.css', __FILE__));
		wp_enqueue_script('interactive_server_map_gstatic.js', "https://www.gstatic.com/charts/loader.js", ['jquery']);
		wp_enqueue_script('interactive_server_map_chunk-vendor.js', plugins_url('/lib/chunk-vendor.js', __FILE__), ['jquery']);
		wp_enqueue_script('interactive_server_map.js', plugins_url('/lib/app.js', __FILE__), ['jquery']);
	}

	function generate_json()
	{
		global $wpdb;

		$countries = $wpdb->get_results(
			"SELECT term.term_id as id, name as countryName, UPPER(slug) as countryCode
        		FROM $wpdb->terms as term
        		LEFT JOIN $wpdb->term_taxonomy AS term_tax ON term_tax.term_id=term.term_id WHERE term_tax.taxonomy='" . self::COUNTRY_TAXONOMY . "'
        		"
		);

		foreach ($countries as $country) {
			$providres_args = [
				'posts_per_page' => -1,
				'fields' => 'ids',
				'tax_query' => [
					[
						'taxonomy' => self::COUNTRY_TAXONOMY,
						'field' => 'term_id',
						'terms' => $country->id
					]
				]

			];
			$query = new wp_query($providres_args);
			$country->providers = $query->posts;
		}
		$response = new stdClass();

		$response->mapList = $countries;
		$response->providers = $this->get_prepared_providers();

		return new WP_REST_Response($response, 200);
	}

	function register_rest_route()
	{
		register_rest_route('vavt-interactive/v1', '/server_map_json', [
			'methods' => 'GET',
			'callback' => [$this, 'generate_json']
		]);
	}

	function get_prepared_providers()
	{
		$providers = [];
		$prov_args = [
			'posts_per_page' => -1,
			'post_type'   => 'post',
			'category_name' => 'vpn-anbieter,anbieter',
		];

		$prov_query = new wp_query($prov_args);

		foreach ($prov_query->posts as $raw) {
			$providers[$raw->ID] = new Provider($raw);
		}

		return $providers;
	}

	function register_acf_fields()
	{
		/** Contains function which import fields */
		require_once __DIR__ . '/inc/fields.php';
	}
}

$vavtServerMap = new VavtServerMap();
