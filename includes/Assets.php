<?php

namespace Tune\Enhancer;

class Assets{

    function __construct(){
        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_assets']);
        add_action( 'admin_enqueue_scripts', [$this, 'enqueue_assets']);
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
                'version' => filemtime(TuneEnhancer_PATH. '/assets/css/admin_style.css')
            ]
        ];
    }

    public function enqueue_assets(){
        $scripts= $this-> get_scripts();

        foreach ($scripts as $handle => $script) {
            $deps = isset($script['deps']) ? ($script['deps']): false;
            wp_register_script($handle, $script['src'], $deps, $script['version'], true);
        }
        
        // Localize and pass audio URLs to frontend.js
        $before_audio = esc_url(get_option('te_before_audio')); // Option for before audio
        $after_audio = esc_url(get_option('te_after_audio'));   // Option for after audio

        wp_localize_script('tuneEnhancer-script', 'te_audio_urls', [
        'beforeAudio' => $before_audio,
        'afterAudio'  => $after_audio,
        ]);

        
        $styles= $this-> get_styles();

        foreach ($styles as $handle => $style) {
            $deps = isset($style['deps']) ? ($style['deps']): false;
            wp_register_style($handle, $style['src'], $deps, $style['version']);
        }
    }
    
}
