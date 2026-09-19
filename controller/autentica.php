<?php
session_start();
require_once ("../model/login.model.php");

$user = $_POST['txtusuario'];
$pass = $_POST['txtpassword'];

$login = new Login();
$data = $login->Acceso($user,$pass);

	if ($data['cod_usu'] > 0){

		switch ($data['niv_usu']) {
			case 1:
				# Administrador
				$_SESSION['personal'] = $data['cod_usu'];
				header("Location: ../admin/index.php");
				break;
			case 2:
				# Personal
				$_SESSION['personal'] = $data['cod_usu'];
				header("Location: ../view/bienvenido.php");
				break;

			default:
				# code...
				break;
		}
	}else{
		echo "Vacio";
		header("Location: ../index.html");
	}