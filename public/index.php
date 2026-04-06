<?php
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


