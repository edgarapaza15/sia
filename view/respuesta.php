<?php
session_start();
require("cabecera.php");

$codProy = $_REQUEST['codProy'];
$notario = $_REQUEST['Notario'];
$codNot = $_REQUEST['codNot'];


	//echo "Session Proyecto: ".$_SESSION['proyecto'];
	$msg = $_GET['msg'];

	if($msg == "hecho"){
		echo "
		<div class='container'>
			<div class='row'>
				<div class='col-md-12'>
					<h3>Sistema de Verificacion</h3>
					<hr>
					<h2>¡Excelecte! ya has ingresado un nuevo dato.</h2>
					<br>
					<p>Recuerda que con este trabajo, nos ¡beneficiamos todos!, y estamos contribuyendo a mejorar nuestra institución. Contamos con tu apoyo a mejorar nuestros servicios.  ¡Si puedes hacerlo!</p>
					<br>
					<a href='ingresoIndice.php?codProy=".$codProy."&Notario=".$notario."&codNot=".$codNot."' class='btn btn-primary'>Listo!... Ingresar otro</a>
				</div>
			</div>
		</div>
		";
	}

	if($msg == "Duplicado"){
		echo "
		<div class='container'>
			<div class='row'>
				<div class='col-md-12'>
					<h3>Sistema de Verificacion</h3>
					<hr>
					<h3>¡Gracias por su colaboración! pero esta información se encuentra DUPLICADA.</h3>
					<p>Por favor ingresa el siguiente. ¡Si puedes hacerlo!</p>
					<br><br><br>
					<a href='ingresoIndice.php?codProy=".$codProy."&Notario=".$notario."&codNot=".$codNot."' class='btn btn-primary'>Listo!... Ingresar otro</a>
				</div>
			</div>
		</div>
		";
	}
