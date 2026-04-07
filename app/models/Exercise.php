<?php

class Exercise {

    /*Usamos la trait Modelo */
    use Model;

    /*Sobre-escribimos tabla para que sea la de esta clase */
    protected $table = 'exercises';

    /*Para no guardar cosas al pedo en el método post, y dejar habilitadas solo columnas a edición */
    protected $allowedColumns = ['title', 'content', 'image'];
}