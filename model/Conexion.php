<?php
class Conexion
{
    private $conn;

    public function __construct()
    {
        $host = "localhost";
        $user = "usuario";
        $pass = "archivo123$";
        $db   = "indices";

        $this->conn = new mysqli($host, $user, $pass, $db);

        if ($this->conn->connect_errno) {
            echo "Error al contenctar a MySQL: (" . $this->conn->connect_errno . ") " . $this->conn->connect_error;
            exit();
        }

        //echo $this->conn->host_info . "KATARI";
        return $this->conn;
    }

    public function ConsultaSin($sql)
    {
        // Sirve para: INSERT, UPDATE, DELETE
        try {
            $this->conn->query($sql);
            $res = true;
        } catch (Exception $e) {
            echo 'Excepción: ',  $e->getMessage();
            $res = false;
        }

        return $res;
    }

    public function ConsultaCon($sql)
    {
        // Sirve para: SELECT
        try {
            $result = $this->conn->query($sql);
        } catch (Exception $e) {
            echo 'Excepción: ',  $e->getMessage();
        }

        return $result;
    }

    public function ConsultaArray($sql)
    {
        // Sirve para: SELECT convertido en array
        try {
            $result = $this->conn->query($sql);
        } catch (Exception $e) {
            echo 'Excepción: ',  $e->getMessage();
        }

        $data = $result->fetch_array(MYSQLI_ASSOC);

        return $data;
    }
}

