<?php
class App
{

    private $controller = 'Home';
    private $method = 'index';


    /* Función para separar la URL por sus '/' y meterla a un array.
    Cada valor del array es la URL cortada, la key 0 generalmente es la página a la que el usuario quiere accerder
    */
    private function splitURL()
    {



        /*Accedemos a la key url que agarramos de .htaccess, si no hay nada, $URL se queda con el valor home */
        $URL = $_GET['url'] ?? "home";
        /*Con la función explode, metemos cada string separado con '/' en un arreglo, lo trimeamos con '/' antes para que no queden espacios vacios */
        $URL = explode('/', trim($URL, '/'));
        return ($URL);
    }

    public function loadController()
    {


        //Usamos this para llamar un método estático en la misma clase.
        $URL = $this->splitURL();

        /*  
        accedemos a la carpeta del controlador que ponga el usuario en la URL agarrando el primer elemento del array $URL
        (pasando a mayuscula la primera letra porque nuestras clases del controlador estan en mayúscula)
        */
        $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";

        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]);
            /*Como ya asignamos controlador, sacamos la key 0 del arreglo URL para limpiarlo y dejarlo solo para los parametros */
            unset($URL[0]);
        } else {
            $filename = "../app/controllers/_404.php";
            require $filename;
            $this->controller = "_404";
        }


        $controller = new $this->controller;

        /*Si existe algo en el segundo slash de la URL, entra en el if y reescribe el método, si no, se queda como index */
        if (!empty($URL[1])) {
            if (method_exists($controller, $URL[1])) {
                $this->method = $URL[1];
                /*Como ya asignamos método, sacamos la key 1 del arreglo URL para limpiarlo y dejarlo solo para los parametros */
                unset($URL[1]);
            }
        }

        $URL = array_values($URL);

        /*Primero: Objeto - Segundo: Método - Tercero: Parametros */
        call_user_func_array([$controller, $this->method], $URL);
    }
}
