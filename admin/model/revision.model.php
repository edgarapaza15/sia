<?php
require_once("Conexion.php");
class Revision
{
    private $con;

    function __construct() {
        $conexion = new Conexion();
        $this->con = $conexion->Conectar();
        return $this->con;
    }

    public function RevisarxNotario($idnotario=55, $year="1929")
    {
        $sql = "SELECT codIndice,codNotario,otorgante,favorecido,fecha,subserie,
        folio,escritura,bien,codProyecto,idpersonal
        FROM indices   WHERE codNotario = $idnotario AND fecha LIKE '$year%' AND
        revisado = 0 order by escritura LIMIT 20;";

        if(!$result = $this->con->query($sql)) {
            echo "Error: " . mysqli_error($this->con) ;
        }
        return $result;
        mysqli_close($this->con);
    }

    public function RevisarEscritura($idindice)
    {
        $sql = "SELECT codIndice,codNotario,otorgante,favorecido,fecha,subserie,folio,escritura,bien
            FROM indices WHERE codIndice = $idindice AND revisado = 0 LIMIT 1;";

        if(!$result = $this->con->query($sql)) {
            echo "Error: " . mysqli_error($this->con) ;
        }
        $fila = $result->fetch_array(MYSQLI_ASSOC);

        return $fila;
        mysqli_close($this->con);
    }

    public function SaveChanges($codIndice, $otorgante,$favorecido,$fecha,$subserie,$folio,$escritura,$bien)
    {
        $sql = "UPDATE indices SET codNotario = 55,otorgante = '$otorgante',favorecido = '$favorecido',
        fecha = '$fecha',subserie = '$subserie',folio = '$folio',escritura = '$escritura',bien = '$bien',
        corregido = '1' WHERE codIndice = '$codIndice' LIMIT 1;";

        if(!$result = $this->con->query($sql)) {
            echo "Error: " . mysqli_error($this->con) ;
        }

        mysqli_close($this->con);
    }

    public function ValidarIngreso($idindice){

        $sql = "UPDATE indices SET revisado='1' WHERE codIndice='$idindice' LIMIT 1;";

        if(!$result = $this->con->query($sql)) {
            echo "Error: " . mysqli_error($this->con) ;
        }
        return $result;
        mysqli_close($this->con);


    }
}
