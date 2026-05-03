<?php

Trait Database {
    
    private function connect()
    {
        // Cambiado 'hostname' por 'host' = Acordarse de cambiarlo en copias del framework
        $string = "mysql:host=".DBHOST.";dbname=".DBNAME.";port=".DBPORT.";charset=utf8";
        $conn = new PDO($string, DBUSER, DBPASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Esto ayuda a ver errores de DB
        return $conn;
    }

    public function query($query, $data = [])
    {
        $con = $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($data);
        if ($check)
            {
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
                if(is_array($result) && count($result))
                    {
                        return $result;
                    }
            }

        /*Si pasamos los if y no se ejecutaron, devolvemos false
        Tambien puede devolver false si hacemos query que no devuelvan resultados, como un delete.
        */
        return false;

    }

    public function get_row($query, $data = [])
    {
        $con = $this->connect();
        $stm = $con->prepare($query);

        $check = $stm->execute($data);
        if ($check)
            {
                $result = $stm->fetchAll(PDO::FETCH_OBJ);
                if(is_array($result) && count($result))
                    {
                        return $result[0];
                    }
            }

        return false;

    }


}


