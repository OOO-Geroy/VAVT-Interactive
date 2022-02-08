<?php
require_once(__DIR__ . '/inc/classes.php');

use vavt_interactive\modules\server_map\Provider;

class VavtServerMap
{

	const VERSION = '1.0.2';

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

		wp_enqueue_style('interactive_server_map_fontawesome.css', "https://use.fontawesome.com/releases/v5.0.13/css/all.css", [], self::VERSION);
		wp_enqueue_style('interactive_server_map_font.css', "https://fonts.googleapis.com/css2?family=Roboto&display=swap", [], self::VERSION);
		wp_enqueue_style('interactive_server_map.css', plugins_url('/css/app.css', __FILE__),  [], self::VERSION);
		wp_enqueue_script('interactive_server_map_gstatic.js', "https://www.gstatic.com/charts/loader.js", ['jquery'], self::VERSION);
		wp_enqueue_script('interactive_server_map_chunk-vendor.js', plugins_url('/lib/chunk-vendor.js', __FILE__), ['jquery'], self::VERSION);
		wp_enqueue_script('interactive_server_map.js', plugins_url('/lib/app.js', __FILE__), ['jquery'], self::VERSION);
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

		$posts = get_posts([
			'posts_per_page' => -1,
			'category_name' => 'vpn-anbieter,anbieter',
			'include' => $this->get_product_post_map()
		]);

		foreach ($posts as $post) {
			$providers[$post->ID] = new Provider($post);
		}

		return $providers;
	}

	function register_acf_fields()
	{
		/** Contains function which import fields */
		require_once __DIR__ . '/inc/fields.php';
	}

	function get_product_post_map($type = 'vpn')
	{
		if (!file_exists(K8_PATH_LOC . '/' . 'vpnidPid.json')) return [];

		if ($type === 'vpn') return array_map(fn($map) => $map['pid'], json_decode(file_get_contents(K8_PATH_LOC . '/' . 'vpnidPid.json'), true));
	}
}

$vavtServerMap = new VavtServerMap();
