<?php

require_once("Conexion.php");

class Login
{
    private $conn;

    public function __construct()
    {
        $this->conn = new Conexion();
        return $this->conn;
    }

    public function Acceso($user, $pass)
    {
        $sql = "SELECT cod_usu, niv_usu, chk_usu FROM usuarios WHERE log_usu='$user' AND psw_usu='$pass';";
        $data = $this->conn->ConsultaArray($sql);
        return $data;
    }
}
