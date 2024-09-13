<?php

namespace Tune\Enhancer\Frontend;

/**
 * Shortcode Handler Class
 */

class Shortcode{
    function __construct(){
        add_shortcode( 'te_mplayer_1', [$this,'render_shortcode']);
    }

    function render_shortcode($atts, $content=''){
        wp_enqueue_script('tuneEnhancer-script');
        wp_enqueue_style('tuneEnhancer-style');

        ob_start();
        include __DIR__ . '/views/te-mplayer-1.php';

        return ob_get_clean();
    }
}
