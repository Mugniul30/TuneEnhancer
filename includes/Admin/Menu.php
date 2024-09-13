<?php

namespace Tune\Enhancer\Admin;

class Menu{
    function __construct(){
        add_action('admin_menu',[$this,'admin_menu']);
    }

    public function admin_menu(){
        
        $capability = 'manage_options';
        $menu_slug = 'tuneenhancer';
        
        $hook = add_menu_page(__('Tune Enhancer','tune-enhancer'), __('Tune Enhancer','tune-enhancer'), $capability, $menu_slug, [$this, 'plugin_page'], 'dashicons-shortcode');

        //add_action('admin_head-' . $hook, [$this, 'enqueue_assets']);
    }

    public function plugin_page(){
        echo 'Hello From Plugin Page';
    }
}
