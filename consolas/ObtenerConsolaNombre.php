<?php

// Hago que se muestren los errores si los hay
ini_set('display_errors', 1);

require_once('vistas/VistaJson.php');
require_once('controladores/ControladorConsolas.php');

// Tipo de vista de la salida de datos.
$vista = new VistaJson();

// Con esta función nos aseguramos que cualquier excepción que ocurra se muestre adecuadamente
// en el mismo formato para evitar problemas.
set_exception_handler(function ($exception) use ($vista) 
{
    $cuerpo = array(
        array(
            "estado" => $exception->estado,
            "mensaje" => $exception->getMessage()
        )
    );
    if ($exception->getCode()) 
    {
        $vista->estado = $exception->getCode();
    } 
    else 
    {
        $vista->estado = 500;
    }

    $vista->imprimir($cuerpo);
});

// Obtengo los datos pasados por POST
$id = $_REQUEST['ID'];

// Me creo un controlador de consolas
$controladorConsolas = new ControladorConsolas();

// Saco por pantalla en formato JSON el resultado
$vista->imprimir($controladorConsolas->obtenerConsolaPorID($id));