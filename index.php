<?php
require_once("config.php"); // Se incluye el archivo de configuración (asumo que contiene variables como 'urlsite')
require_once("controlador/index.php"); // Se incluye el archivo que contiene la definición del controlador 'modeloController'

if(isset($_GET['m'])): // Se verifica si se proporciona un parámetro 'm' en la URL
    if(method_exists("modeloController",$_GET['m'])): // Se comprueba si el método especificado existe en el controlador 'modeloController'
        modeloController::{$_GET['m']}(); // Se llama dinámicamente al método especificado en 'm' dentro del controlador 'modeloController'
    endif;
else: // Si no se proporciona un parámetro 'm' en la URL
    modeloController::index(); // Se llama al método 'index' del controlador 'modeloController' por defecto
endif;
?>
