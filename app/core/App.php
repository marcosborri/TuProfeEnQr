<?php
class App
{

    private $controller = 'Home';
    private $method = 'index';

    private function splitURL()
    {




        $URL = $_GET['url'] ?? "home";

        $URL = explode('/', trim($URL, '/'));
        return ($URL);
    }

    public function loadController()
    {



        $URL = $this->splitURL();


        $filename = "../app/controllers/" . ucfirst($URL[0]) . ".php";

        if (file_exists($filename)) {
            require $filename;
            $this->controller = ucfirst($URL[0]);
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
