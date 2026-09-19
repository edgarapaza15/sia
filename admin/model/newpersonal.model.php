<?php
require_once("Conexion.php");

class Personal
{
    private $conn;

    function __construct()
    {
        $link = new Conexion();
        $this->conn = $link->Conectar();
        return $this->conn;
    }

    public function Guardar($nombre, $paterno, $materno, $dni)
    {
         printf("Nombre: %s, Paterno: %s  Materno: %s DNI: %s", $nombre, $paterno, $materno);
        $sql = "INSERT INTO usuarios VALUES(null,'$nombre', '$paterno','$materno','$dni','$dni', 2,1)";

        if(!$this->conn->query($sql)){
            echo "Error: " . mysqli_error($this->conn);
        }

        mysqli_close($this->conn);
        echo "hecho";
    }

}
