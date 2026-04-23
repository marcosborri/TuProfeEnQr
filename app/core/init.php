<?php
/* Cargar configuración primero */
require 'config.php';
require 'functions.php';

/* Autoload de Modelos */
spl_autoload_register(function($classname){
    // Ajustamos la ruta para que sea absoluta respecto a este archivo
    $file = __DIR__ . "/../models/" . ucfirst($classname) . ".php";
    
    if (file_exists($file)) {
        require $file;
    }
});

/* Cargar archivos base con rutas absolutas para evitar errores de nivel */
require __DIR__ . '/Database.php';
require __DIR__ . '/Model.php';
require __DIR__ . '/Controller.php';
require __DIR__ . '/App.php';