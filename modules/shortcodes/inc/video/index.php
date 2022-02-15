<?php
namespace vavt_interactive\modules\shortcodes;

class Video {

	public $default_atts = ['autoplay' => 'true', 'loop' => 'true', 'muted' => 'muted', 'playsinline' => 'true', 'controlsList' => 'nodownload'];

	function __construct() {
		add_shortcode('VAVT_VIDEO', [$this, 'register_shortcode']);
	}

	public function register_shortcode($atts = null, $content = null) {

		$this->register_script();

		if(isset($atts['autoplay']) && $atts['autoplay']=='false'){
		  unset($atts['autoplay']);
		  unset($this->default_atts['autoplay']);
		}

		if(isset($atts['muted']) && $atts['muted']=='false'){
		  unset($atts['muted']);
		  unset($this->default_atts['muted']);
		}

		$atts_array = array_merge($this->default_atts, $atts);
		$atts_str = $this->convert_atts_to_html($atts_array);

		$content = $this->prepare_content($atts, $content);
		return "<video $atts_str>" . $content . "</video>";
	}

	public function convert_atts_to_html($attributes){
		// echo '<pre>';
		// print_r($attributes);
		// echo '</pre>';
		$attz="";

		foreach ($attributes as $key => $value) {
			if ($key==='src')
				continue;
			$attz .= " " . $key . "=" . $value . " ";
		}
		return $attz;

		// return join(' ', array_map(function($key) use ($attributes)
		// {
		//    if(is_bool($attributes[$key]))
		//    {
		// 	  return $attributes[$key]?$key:'';
		//    }
		//    return $key.'="'.$attributes[$key].'"';
		// }, array_keys($attributes)));
	}

	public function register_script() {
		wp_enqueue_script( 'vavt-shortcodes-video.js', plugins_url( '/js/video-short.js', __FILE__ ));
	}

	public function prepare_content($atts, $content = null) {
		if(isset($atts['src'])) {
			$extension = [];
			preg_match('/\.([0-9a-z]{1,5})$/i', $atts['src'], $extension);
			$content = '<source data-src="' . $atts['src'] . '" type="video/'. $extension[1] .'">';
		} else {
			$content = str_replace(' src=', ' data-src=', $content);
		}
		return $content;
	}

}
$vavt_video = new \vavt_interactive\modules\shortcodes\Video();