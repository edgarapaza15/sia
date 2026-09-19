<?php
require_once("../model/newpersonal.model.php");

$nombre  = trim(strtoupper($_POST['nombre']));
$paterno = trim(strtoupper($_POST['paterno']));
$materno = trim(strtoupper($_POST['materno']));
$dni     = trim($_POST['dni']);

$personal = new Personal();
$personal->Guardar($nombre, $paterno, $materno, $dni);

header("Location: ../new_personal.php");
