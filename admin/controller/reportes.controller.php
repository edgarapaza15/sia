<?php
require_once "../model/reportes.model.php";

$reportes = new Reportes();
$data1 = $reportes->TotalRegistros(05);

$year = $_GET['year'];
$mes = $_GET['mes'];
$personal = $_GET['personal'];
$fecha_inicio = $_GET['fecha_inicio'];
$fecha_final = $_GET['fecha_final'];

if (isset($_REQUEST['btnQueryMes'])) {
    echo "Busqueda por MES";
    echo "<br>";
    echo $year."<br>";
    echo $mes."<br>";
    echo $personal."<br>";

    if ($personal == "all") {
        echo "<br>Buscando todos";

    }else{
        echo "Buscando por codigo: " . $personal;
    }
}

if (isset($_REQUEST['btnQueryFechas'])) {
    echo "Busqueda por FECHAS <br>";
    echo $fecha_inicio."<br>";
    echo $fecha_final."<br>";

    if ($fecha_inicio == "") {
        echo "Debe especificar una fecha de busqueda.";
    }
    if ($fecha_final == "") {
        echo "NO uso";
    }
}
