<?php
require_once "Conexion.php";
class Reportes
{
    private $con;

    function __construct()
    {
        $conexion = new Conexion();
        $this->con = $conexion->Conectar();
        return $this->con;
    }

    public function NombreTrabajador($idpersonal)
    {
      //Muestra el total por trabajador de un mes espeficicado
        $sql = "SELECT concat(nom_usu,' ',pat_usu, ' ', mat_usu) as personal FROM usuarios WHERE cod_usu = ". $idpersonal;

        if (!$result = $this->con->query($sql)) {
            echo "Error en la consulta personal: " . mysqli_error($this->con);
        }
        $data = $result->fetch_array(MYSQLI_ASSOC);
        return $data;
        mysqli_close($this->con);
    }

    public function TotalRegistros($mes)
    {
      // Reportes muestra la lista de todo e personal y totales agrupado por mes
        $sql = "SELECT idpersonal, count(*) as total, (SELECT concat(nom_usu,' ', pat_usu, ' ', mat_usu)
        FROM usuarios WHERE cod_usu = idpersonal) AS personal FROM indices
        WHERE fecCreate LIKE '2020-$mes-%'
        group by idpersonal;";

        if (!$result = $this->con->query($sql)) {
            echo "Error en la consulta: " . mysqli_error($this->con);
        }

        return $result;
        mysqli_close($this->con);
    }

    public function TotalRegistrosxTrabajador($idpersonal, $mes)
    {
      //Muestra el total por trabajador de un mes espeficicado
        $sql = "SELECT count(*) as total FROM indices
                WHERE idpersonal = $idpersonal AND fecCreate LIKE '2020-$mes-%';";

        if (!$result = $this->con->query($sql)) {
            echo "Error en la consulta total: " . mysqli_error($this->con);
        }
        $data = $result->fetch_array(MYSQLI_ASSOC);
        return $data;
        mysqli_close($this->con);
    }

    public function DetalleRegistrosPersonal($idpersonal, $mes)
    {  //Muestra en detalle los datos de los ingresos por cada trabajador de un mes especificado
        $sql = "SELECT codIndice, escritura, codProyecto, fecCreate, corregido, revisado FROM indices
                WHERE idpersonal = $idpersonal AND fecCreate LIKE '2020-$mes-%';";

        if (!$result = $this->con->query($sql)) {
            echo "Error en la consulta Detalles: " . mysqli_error($this->con);
        }

        return $result;
        mysqli_close($this->con);
    }


    public function getListPersonal() {
        $sql = "SELECT cod_usu, concat(nom_usu,' ', pat_usu, ' ', mat_usu) as trabajador
        FROM usuarios";
        if (!$result = $this->con->query($sql)) {
            echo "Error listado: " . mysqli_error($this->con);
        }
        return $result;
        mysqli_close($this->con);
    }

    public function TotalUnaFecha($idpersonal, $fecha1)
    {
        //Muestra el total por trabajador de un mes espeficicado
        $sql = "SELECT count(*) as total FROM indices
                WHERE idpersonal = $idpersonal AND fecCreate LIKE '$fecha1%';";

        if (!$result = $this->con->query($sql)) {
            echo "Error en la consulta total una fecha: " . mysqli_error($this->con);
        }
        $data = $result->fetch_array(MYSQLI_ASSOC);

        return $data;
        mysqli_close($this->con);
    }

    public function TotalDosFecha($idpersonal, $fecha1, $fecha2)
    {
        //Muestra el total por trabajador de un mes espeficicado
        $sql = "SELECT count(*) as total FROM indices
                WHERE idpersonal = $idpersonal AND fecCreate
                between '$fecha1 00:00:00' and '$fecha2 23:59:59';";

        if (!$result = $this->con->query($sql)) {
            echo "Error en la consulta total dos fecha: " . mysqli_error($this->con);
        }
        $data = $result->fetch_array(MYSQLI_ASSOC);

        return $data;
        mysqli_close($this->con);
    }

    public function DetalleUnaFecha($idpersonal, $fecha)
    {
        //Muestra el total por trabajador de un mes espeficicado
        $sql = "SELECT codIndice, escritura, codProyecto, fecCreate, corregido, revisado FROM indices
                WHERE idpersonal = $idpersonal AND fecCreate LIKE '$fecha%';";

        if (!$result = $this->con->query($sql)) {
            echo "Error en la consulta detalle un fecha: " . mysqli_error($this->con);
        }
        return $result;
        mysqli_close($this->con);
    }

    public function DetalleDosFecha($idpersonal, $fecha1, $fecha2)
    {
        //Muestra el total por trabajador de un mes espeficicado
        $sql = "SELECT codIndice, escritura, codProyecto, fecCreate, corregido, revisado FROM indices
                WHERE idpersonal = $idpersonal AND fecCreate
                BETWEEN '$fecha1 00:00:00' AND '$fecha2 23:59:59'";

        if (!$result = $this->con->query($sql)) {
            echo "Error en la consulta detalle dos fechas: " . mysqli_error($this->con);
        }
        return $result;
        mysqli_close($this->con);
    }
}

