<?php
/**
 * Plugin Name: TuneEnhancer
 * Plugin URI:  https://mugniulafif.com/services/
 * Author:      Mugniul Afif
 * Author URI:  https://mugniulafif.com/
 * Description: Enhance your site's audio experience with TuneEnhancer—a WordPress plugin that lets you toggle between before-and-after audio tracks with a customizable audio player.
 * Version:     1.0.0
 * License:     GPL-2.0+
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 
*/


if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__.'/vendor/autoload.php';


/**
 * The Main TuneEnhancer Plugin Class
 */

final class TuneEnhancer{
    const version= '1.0';


    /**
     * Class Constructor
     *
     */
    private function __construct(){
        
        $this->define_constants();
        register_activation_hook( __FILE__, [$this, 'activate'] );
        add_action('plugins_loaded',[$this, 'init_plugin']);
    }

    /**
     * Intializes a singleton instance
     *
     * @return \TuneEnhancer
     */

    public static function init(){
        static $instance = false;

        if (!$instance) {
            $instance= new self();
        }

        return $instance;
    }

    /**
     * Define the required constants
     *
     * @return void
     */

     public function define_constants(){
        define('TuneEnhancer_VERSION', self::version);
        define('TuneEnhancer_FILE', __FILE__);
        define('TuneEnhancer_PATH', __DIR__);
        define('TuneEnhancer_URL', plugins_url ('', TuneEnhancer_FILE ));
        define('TuneEnhancer_ASSETS', TuneEnhancer_URL.'/assets');

    }

    public function activate(){
        $installer = new Tune\Enhancer\Installer();
        $installer->add_version();
    }

    function init_plugin(){

        if (is_admin()) {
            new Tune\Enhancer\Admin();
        }else {
            new Tune\Enhancer\Frontend();
        }

        
    }

}


/**
 * Intialize TuneEnhancer Plugin
 *
 * @return \TuneEnhancer
 */
function tune_enhancer(){
    return TuneEnhancer::init();
}

//kick-off TuneEnhancer
tune_enhancer();
