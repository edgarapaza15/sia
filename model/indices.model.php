<?php
require_once("Conexion.php");

class Indices
{
	private $con;

	function __construct() {

		$conection = new Conexion();
		$this->con = $conection->Conectar();
		return $this->con;
	}
		public function Duplicados($data)
		{
			extract($data);

			$sql = "SELECT count(*) FROM indices WHERE otorgante = '$otorgante' AND favorecido = '$favorecido' AND fecha = '$fecha' AND subserie = '$subserie' AND folio = '$folio' AND escritura = '$escritura'";
			echo $sql;
			$result = $this->con->query($sql);
			$data   = $result->fetch_array();

			echo "Numero dato".$data[0];

			if($data[0] == FALSE){
				$rpta = FALSE;
			}

			if($data[0] == TRUE){
				$rpta = TRUE;
			}

			return $rpta;
			mysqli_close($this->con);
		}

		public function Insertar($data)
		{
      extract($data);
      $sql = "INSERT INTO indices (codNotario,otorgante,favorecido,fecha,subserie,folio,escritura,minuta,bien,tomo,codProyecto,idpersonal,fecCreate,corregido,revisado) VALUES ('$codNotario','$otorgante','$favorecido','$fecha','$subserie','$folio','$escritura','$minuta','$bien','$tomo','$codProyecto','$idpersonal',now(),0,0);";
			echo $sql;
			if(!$this->con->query($sql))
			{
				echo "Error: " . mysqli_error($this->con);
			}

			mysqli_close($this->con);
		}

	}

?>
