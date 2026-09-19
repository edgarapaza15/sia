<?php
require_once("Conexion.php");

class Proyectos
{
    private $con;

    function __construct() {

        $conexion = new Conexion();
        $this->con = $conexion->Conectar();
        return $this->con;
  }

  public function ProyectosSinCerrar()
  {
    $sql = "SELECT CodProyecto, codNotario FROM Proyecto WHERE terminado = 0;";
    if(!$result = $this->con->query($sql))
    {
      echo "Error Proyectos sin Cerrar: ". mysqli_error($this->con);
    }
    return $result;
    mysqli_close($this->con);
  }

  public function ProyectosCerrados()
  {

  }

}
