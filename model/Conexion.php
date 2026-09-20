<?php

require_once "../config/config.php";

class Conexion
{
    private $host = "localhost";
    private $user = "usuario";
    private $pass = "archivo123$";
    private $db = "indices";

    public function Conectar()
    {
        $mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        $mysqli->set_charset("utf8mb4");
        if ($mysqli->connect_errno) {
            echo "Error al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            exit();
        }

        #echo $mysqli->host_info . " Test eb Conection.php";

        return $mysqli;
    }
}
