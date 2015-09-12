<?php

/*
Plugin Name: Planes de Estudio
Plugin URI: http://akismet.com/
Description:  Plugin que consume web service para mostrar planes de estudio
Version: 1
Author: Anderson Holguin
Author URI: http://automattic.com/wordpress-plugins/
License: GPLv2 or later
*/

/*
Este programa ha sido creado la Universidad Catolica, para mostrar la información de sus planes de estudio.
*/
define( 'PLAN_ESTUDIO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once ( PLAN_ESTUDIO_PLUGIN_DIR .'controllerPe.class.php');

add_action( 'init', 'setShortCodes');

if (!function_exists('setShortCodes')){
    
    function setShortCodes() {
        add_shortcode('Planes_Estudio_AHA','getPlanes');
    }
}

if(!function_exists('getPlanes')){
    
    function getPlanes($args,$content) {
        
        $pluginPlanes= new controllerPe($args);
        $pluginPlanes->rederPlugin();
        
    }
}



