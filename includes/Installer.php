<?php

namespace Tune\Enhancer;


/**
 * Installer Class
 */

class Installer{
    
    public function add_version(){
        $installed= get_option('te_installed');

        if (!$installed) {
            update_option('te_installed', time());    
        }
        update_option('tuneenhancer_version',TuneEnhancer_VERSION);
    }
}
