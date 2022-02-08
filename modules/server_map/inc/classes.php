<?php
    namespace vavt_interactive\modules\server_map;

    class JsonRoot {

        public $mapList = [];
        public $providers = [];

        // function __construct($mapList = null, $providers = null) {
        //     if($mapList) $this->mapList = $mapList;
        //     if($) $this->mapList = $mapList;
        // }
    }

    class Provider {
        public $name;
        public $logo;
        public $revLink;
        public $affLink;
        public $priority;
        public $order;

        function __construct($post = null) {
        	if(!$post) return false;

        	$affLink = array_values(get_post_meta( $post->ID, 'wppr_links', true ))[0];
        	$name = get_post_meta( $post->ID, 'cwp_rev_product_name', true );
            $priority = (int)get_post_meta( $post->ID, 'vavt_interactive_server_map_priority', true );
            $order = (int)get_post_meta( $post->ID, 'vavt_interactive_server_map_order', true );
        	$this->name = $name;
        	$this->logo = get_the_post_thumbnail_url( $post );
        	$this->revLink = get_permalink( $post );
        	$this->affLink = $affLink;
        	$this->priority = $priority === 0 ? null : $priority;
        	$this->order = $order === 0 ? null : $order;
        }
    }