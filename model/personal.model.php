<?php
require_once("Conexion.php");

class Personal
{
	private $conn;

	function __construct() {

		$this->conn = new Conexion();
		return $this->conn;
	}

	public function getPersonal($idpersonal)
	{

    $sql = "SELECT concat(nom_usu,' ', pat_usu, ' ', mat_usu) as trabajador FROM usuarios WHERE cod_usu = $idpersonal;";
    $data = $this->conn->ConsultaArray($sql);
    return $data;
	}
}
