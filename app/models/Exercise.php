<?php

class Exercise
{

    /*Usamos la trait Modelo */
    use Model;

    /*Sobre-escribimos tabla para que sea la de esta clase */
    protected $table = 'exercises';


    /*Para no guardar cosas al pedo en el método post, y dejar habilitadas solo columnas a edición */
    protected $allowedColumns = ['title', 'content', 'image'];

    public function validate($data, $files)
    {
        $this->errors = [];

        // TÍTULO
        if (empty(trim($data['title']))) {
            $this->errors['title'] = 'Se requiere un título';
        } else if ($data['title'] !== strip_tags($data['title'])) {
            $this->errors['title'] = 'No se permiten etiquetas HTML';
        }


        // CONTENIDO
        if (empty(trim($data['content']))) {
            $this->errors['content'] = 'Se requiere contenido';
        }

        // IMAGEN
        if (empty($files['image']['name'])) {
            $this->errors['image'] = 'Se requiere una imagen';
        } else {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];

            if (!in_array($files['image']['type'], $allowedTypes)) {
                $this->errors['image'] = 'Formato no válido';
            }
        }

        return empty($this->errors);
    }

    public function sanitize($data)
    {
        $data['content'] = strip_tags(
            $data['content'],
            '<h1><h2><h3><p><strong><em><ul><ol><li><br>'
        );

        return $data;
    }
}
