<?php

/*La dejamos como Trait y no como clase porque no queremos que se instacie */
trait Model
{

    /*Usamos la trait database: nos da todas los métodos de Database */
    use Database;

    protected $limit = 10;
    protected $offset = 0;
    public $errors = [];

    /*Va a devolver una fila, no tenemos que poner query como en get_row, acá las query son auto-generadas */
    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from $this->table where ";

        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }
        foreach ($keys_not as $key) {
            $query .= $key . " != :" . $key . " && ";
        }

        $query = trim($query, " && ");

        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);
        $result = $this->query($query, $data);
        if ($result)
            return $result[0];
        return false;
    }
    /*Retornar todas las filas */
    public function findAll()
    {
        $query = "select * from $this->table";
        return $this->query($query);
    }
    /*Retorna múltiples filas */
    public function where($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "select * from $this->table where ";

        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }
        foreach ($keys_not as $key) {
            $query .= $key . " != :" . $key . " && ";
        }

        $query = trim($query, " && ");

        $query .= " limit $this->limit offset $this->offset";
        $data = array_merge($data, $data_not);
        return $this->query($query, $data);
    }
    public function insert($data)
    {
        /*Si tenemos un número de columnas permitidas en el modelo entra al if */
        if (!empty($this->allowedColumns)) {
            /*Itera sobre la data que pasamos */
            foreach ($data as $key => $value) {
                /*Busca si alguna de las key que tiene data NO esta en las columnas permitidas */
                if (!in_array($key, $this->allowedColumns)) {
                    /*Si NO está, la sacamos del arreglo */
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        /*Implode es la operación contraria a explode, convierte array a string, y los "pega" con un valor que le asignemos, en este caso separa las llaves con comas */
        $query = "insert into $this->table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";
        //$query = "insert into $this->table (name, age) values (:name,:age)" -- esta sería la consulta de sql NORMAL, la de toda la vida


        $this->query($query, $data);

        return false;
    }
    public function update($id, $data, $id_column = 'id')
    {

        /*Si tenemos un número de columnas permitidas en el modelo entra al if */
        if (!empty($this->allowedColumns)) {
            /*Itera sobre la data que pasamos */
            foreach ($data as $key => $value) {
                /*Busca si alguna de las key que tiene data NO esta en las columnas permitidas */
                if (!in_array($key, $this->allowedColumns)) {
                    /*Si NO está, la sacamos del arreglo */
                    unset($data[$key]);
                }
            }
        }

        $keys = array_keys($data);
        $query = "update $this->table set ";

        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . ", ";
        }

        $query = trim($query, ", ");

        $query .= " where $id_column = :$id_column ";

        $data[$id_column] = $id;

        $this->query($query, $data);

        return false;
    }
    public function delete($id, $id_column = 'id')
    {
        $data[$id_column] = $id;
        $query = "delete from $this->table where $id_column = :$id_column";

        $this->query($query, $data);

        return false;
    }
}
