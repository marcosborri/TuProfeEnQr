<?php
/*¿Por qué crear una clase Controller cuando ya tenemos una carpeta con controllers?

Porque queremos que esta clase tenga métodos comúnes que van a usar el resto
-> Por ejemplo, todos los controladores deberían ser capaces de crear una vista
-> En vez de ponerle el mismo método a todas las clases, la ponemos en esta y que el resto extienda esta clase.

*/

class Controller 
{
    protected function view($name, $data = [])
    {

        if(!empty($data))
            extract($data);

        $filename = "../app/views/". $name .".view.php";
        if(file_exists($filename)){
            require $filename;
        } else {
            $filename = "../app/views/404.view.php";
            require $filename;
        }
    }
}