<?php
//Antes de arrancar la sesión, configuramos las cookies para que sean seguras y eviten guar

session_set_cookie_params([
    'lifetime' => 0, // dura hasta cerrar navegador
    'path' => '/',
    'domain' => '',
    'secure' => true, //la cookie solo viaja por https
    'httponly' => true, //evita que js acceda a la cookie
    'samesite' => 'Strict' //la cookie no se envia en request de otros sitios
]);

//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//$dotenv->load();


/*Arrancamos la sesión, porque siempre vamos a estar haciendo cosas de login en páginas
  La ventaja de tener una página index es que la sesión siempre se inicia
  Independientemente de la página en la que estemos, la sesión siempre se va a cargar porque pasa por el índice
*/
session_start();

/*Antes de siquiera iniciar la app, cargamos todo lo de init */
require '../app/core/init.php';

DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

$app = new App;

$app->loadController();


