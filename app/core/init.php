<?php
/*Archivo encargado de cargar permanentemente las cosas de la carpeta core, estas estan activas 24/7 */

/*Función para cargar todas las clases que llamemos desde modelos */
spl_autoload_register(function($classname){

    /*Agarramos el file de la clase que necesita ser cargada y lo requerimos */
    require $filename = "../app/models/".ucfirst($classname).".php";

});


/*Cargamos primero la configuración siempre */
require 'config.php';

require 'functions.php';

/*Estas poner siempre en este orden porque Modelo extiende Database, y Controller extiende Modelo */
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';