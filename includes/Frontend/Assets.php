<?php

namespace Tune\Enhancer\Frontend;

class Assets{

    function __construct(){
        add_action( 'wp_enqueue_script', [$this, 'enqueue_assets']);
        add_action( 'admin_enqueue_script', [$this, 'enqueue_assets']);
    }

    public function get_scripts(){
        return[
            'tuneEnhancer-script' => [
                'src' => TuneEnhancer_ASSETS. '/js/frontend.js',
                'version' => filemtime(TuneEnhancer_PATH. '/assets/js/frontend.js'),
                'deps' => ['jquery']
            ],
            'tuneEnhancer-admin-script' => [
                'src' => TuneEnhancer_ASSETS. '/js/admin_script.js',
                'version' => filemtime(TuneEnhancer_PATH. '/assets/js/admin_script.js'),
                'deps' => ['jquery']
            ]
        ];
    }
    public function get_styles(){
        return[
            'tuneEnhancer-style' => [
                'src' => TuneEnhancer_ASSETS. '/css/frontend.css',
                'version' => filemtime(TuneEnhancer_PATH. '/assets/css/frontend.css'),
                'deps' => ['jquery']
            ],
            'tuneEnhancer-admin-style' => [
                'src' => TuneEnhancer_ASSETS. '/css/admin_style.css',
                'version' => filemtime(TuneEnhancer_PATH. '/assets/css/admin_style.css'),
                'deps' => ['jquery']
            ]
        ];
    }

    public function enqueue_assets(){
        $scripts= $this-> get_scripts();

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? ($script['deps']): false;
            wp_register_script($handle, $script['src'], $deps, $script['version'], true);
        }
        
        
        $styles= $this-> get_styles();

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? ($style['deps']): false;
            wp_register_style($handle, $style['src'], $deps, $style['version']);
        }
    }
    
}
