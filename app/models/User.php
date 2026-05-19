<?php

class User {

    /*Usamos la trait Modelo */
    use Model;

    /*Sobre-escribimos tabla para que sea la de esta clase */
    protected $table = 'users';

    /*Para no guardar cosas al pedo en el método post, y dejar habilitadas solo columnas a edición */
    protected $allowedColumns = ['username', 'password'];

}