<?php

namespace Tune\Enhancer\Frontend;

/**
 * Shortcode Handler Class
 */

class Shortcode{
    function __construct(){
        add_shortcode( 'te_mplayer_1', $this,'render_shortcode');
    }

    function render_shortcode($atts, $content=''){
        
    }
}
