<?php

class Exercise {

    /*Usamos la trait Modelo */
    use Model;

    /*Sobre-escribimos tabla para que sea la de esta clase */
    protected $table = 'exercises';


    /*Para no guardar cosas al pedo en el método post, y dejar habilitadas solo columnas a edición */
    protected $allowedColumns = ['title', 'content', 'image'];

    public function validate($data){
        $this->errors = [];
        if(empty($data['title'])){
            $this->errors = 'Se requiere un título para el ejercicio';
        }

        else if (!filter_var($data['title'], FILTER_SANITIZE_SPECIAL_CHARS)) {
            $this->errors = 'Título no es válido';
        }
        
        if(empty($data['content'])){
            $this->errors = 'Se requiere un contenido para el ejercicio';
        }

        $data['content'] = strip_tags(
            $data['content'],
            '<h1><h2><h3><p><strong><em><ul><ol><li><br>'
        );
        
        if(empty($data['image'])){
            $this->errors = 'Se requiere una imagen para el ejercicio';
        }
        
        if(empty($this->errors)){
            return true;
        }

        return false;
    }
}