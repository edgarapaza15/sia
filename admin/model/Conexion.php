<?php

class Conexion
{
  public function Conectar()
  {
    $host = "localhost";
    $user = "usuario";
    $pass = "A@dmin0215.,$";
    $db   = "indices";

    $mysqli = new mysqli($host, $user, $pass, $db);
    $mysqli->set_charset("utf8");
    if ($mysqli->connect_errno) {
      echo "Error al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      exit();
    }

    #echo $mysqli->host_info. " Test eb Conection.php";
    return $mysqli;
  }
}
