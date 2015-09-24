<?php

//validacion de variables
$ws = $_POST['ws'];
$programa = $_POST['programa'];
error_reporting(0);
//**********************
switch ($ws) {
    case 'componente';
        {
            echo '<ul>';
            $html = file_get_contents("http://wso2dsvs.ucatolica.edu.co:2763/services/ws_componente.HTTPEndpoint/componente_oper?programa_academico=$programa");
            $xmlDatos = simplexml_load_string($html);
            foreach ($xmlDatos as $value) {
                echo "<li  value='" . $value->codigo_componente . "' class='clicComponente'><a href='#'>" . $value->descrip_componente . "</a></li>";
            }
            echo '</ul>';
        }break;

    case 'area': {
            $componente = $_POST['componente'];
            $html = file_get_contents("http://wso2dsvs.ucatolica.edu.co:2763/services/ws_area.HTTPEndpoint/area_oper?codigo_componente=$componente&codigo_programa=$programa");
            $xmlDatos = simplexml_load_string($html);
            echo '<ul>';
            foreach ($xmlDatos as $value) {
                echo "<li  value='" . $value->codigo_area . "' class='clicArea'><a href='#'>" . $value->nombre_area . "</a></li>";
            }
            echo '</ul>';
        }break;

    case 'lista_asignats': {
            $area = $_POST['area'];
            $programa = $_POST['programa'];
            $html = file_get_contents("http://wso2dsvs.ucatolica.edu.co:2763/services/ws_lista_asignats.HTTPEndpoint/lista_oper?codigo_programa=$programa&codigo_componente=1&codigo_area=$area");
            $xmlDatos = simplexml_load_string($html);
            echo '<ul>';
            foreach ($xmlDatos as $value) {
                echo "<li  value='" . $value->codigo_asignatura . "' class='clicListaAsignats'><input type='hidden' name= 'valor' id='valor' value= '" . $value->codigo_asignatura . "' ><a href='#'>" . $value->nombre_asignatura . "</a></li>";
            }
            echo '</ul>';
        }break;
    case 'descrip_asignatura': {
            $asignatura = $_POST['asignatura'];
            $html = file_get_contents("http://wso2dsvs.ucatolica.edu.co:2763/services/ws_asignat.HTTPEndpoint/asignat_oper?codigo_asignatura=$asignatura");
            $xmlDatos = simplexml_load_string($html);
            echo '<ul>';
            foreach ($xmlDatos as $value) {
                echo "<li  value='' class=''>" . $value->nombre_asignatura . "</li>";
                echo "<li  value='' class=''>Horas Semanales " . $value->horas_semanales . "</li>";
                echo "<li  value='' class=''>Horas trabajo independiente " . $value->horas_trabajo_indep . "</li>";
            }
            echo '</ul>Prerrequisitos<ul>';
            $html = file_get_contents("http://wso2dsvs.ucatolica.edu.co:2763/services/ws_lista_prerrequisitos.HTTPEndpoint/lista_prerrequisitos_oper?codigo_asignatura=$asignatura");
            $xmlDatos = simplexml_load_string($html);
            foreach ($xmlDatos as $value) {
                echo "<li  value='' class=''>" . $value->codigo_prerrequisito . '-' . $value->nombre_prerrequisito . "</li>";
            }
            echo '</ul>';
        }break;
    default:
        break;
}

