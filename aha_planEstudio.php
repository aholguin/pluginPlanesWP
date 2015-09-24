<?php

/*
  Plugin Name: Planes de Estudio
  Plugin URI: #/
  Description:  Plugin que consume web service para mostrar planes de estudio
  Version: 1
  Author: Anderson Holguin
  Author URI: http://#
  License: GPLv2 or later
 */

/*
  Este programa ha sido creado la Universidad Catolica, para mostrar la información de sus planes de estudio.
 */
define('PLAN_ESTUDIO_PLUGIN_DIR', plugin_dir_path(__FILE__));

//require_once ( PLAN_ESTUDIO_PLUGIN_DIR . 'controllerPe.class.php');

add_action('init', 'setShortCodes');

if (!function_exists('setShortCodes')) {
    function setShortCodes() {
        add_shortcode('Planes_Estudio_AHA', 'getPlanes');
        wp_register_script('script_planEstudio', plugins_url() . '/aha_planEstudio/view/js/vistaPe.js');
    }
}

if (!function_exists('getPlanes')) {

    function getPlanes($args, $content) {
        if (!$args['programacod']) {
            die('Por favor asigne código del programa.');
        }

        wp_enqueue_script('script_planEstudio');
        define(__PROGAMA, $args['programacod']);
        include_once (PLAN_ESTUDIO_PLUGIN_DIR . '/view/vistaPe.php');
    }

}  