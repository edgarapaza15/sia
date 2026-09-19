<?php
require_once("Conexion.php");

class Personal
{
    private $con;

    function __construct() {

        $conexion = new Conexion();
        $this->con = $conexion->Conectar();
        return $this->con;
    }

    public function getPersonal($idpersonal)
    {

        $sql = "SELECT concat(nom_usu,' ', pat_usu, ' ', mat_usu) as trabajador FROM usuarios WHERE cod_usu = $idpersonal;";
        if(!$result = $this->con->query($sql)){
            echo "Error Getpersonal: " . mysqli_error($this->con);
        }

        $data = $result->fetch_array();
        return $data;

        mysqli_close($this->con);

    }
}
