<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of controllerPe
 *
 * @author Anderson Holguin
 */
class controllerPe {

    private $codPrograma;

    public function __construct($args) {
        //var_dump($args);
        //echo 'sdsdsd'.$args['programacod'];
        $this->codPrograma = $args['programacod'];
    }

    public function rederPlugin() {
        $programa = $this->codPrograma;
        $html = file_get_contents("http://wso2dsvs.ucatolica.edu.co:2763/services/ws_componente.HTTPEndpoint/componente_oper?programa_academico=$programa");
        $xmlDatos = simplexml_load_string($html);
        include_once (PLAN_ESTUDIO_PLUGIN_DIR .'./view/vistaPe.php');
    }

}
