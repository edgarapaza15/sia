<?php
require_once ("Conexion.php");

class Login
{
	private $con;

	function __construct()
	{
		$conexion = new Conexion();
		$this->con = $conexion->Conectar();
		return $this->con;
	}

	public function Acceso($user, $pass)
	{
		$sql = "SELECT cod_usu, niv_usu, chk_usu FROM usuarios WHERE log_usu='$user' AND psw_usu='$pass';";

		if(!$result = $this->con->query($sql)){
			echo "Error1: " . mysqli_error($this->con);
		}

		$data = $result->fetch_array(MYSQLI_ASSOC);
		return $data;
	}
}
