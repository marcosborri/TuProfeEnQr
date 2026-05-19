<?php


session_set_cookie_params([
    'lifetime' => 0, // dura hasta cerrar navegador
    'path' => '/',
    'domain' => '',
    'secure' => true, //la cookie solo viaja por https
    'httponly' => true, //evita que js acceda a la cookie
    'samesite' => 'Strict' //la cookie no se envia en request de otros sitios
]);


session_start();

/*Antes de siquiera iniciar la app, cargamos todo lo de init */
require '../app/core/init.php';

DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

$app = new App;

$app->loadController();


