<?php
include_once "../model/indices.model.php";

$proyecto   = $_REQUEST['txt-proyecto'];
$folio      = $_REQUEST['txt-folio'];
$escritura  = $_REQUEST['txt-escritura'];
$serie      = strtoupper($_REQUEST['txt-serie']);
$otorgante  = strtoupper($_REQUEST['txt-otorgante']);
$favorecido = strtoupper($_REQUEST['txt-favorecido']);
$dia        = $_REQUEST['txt-dia'];
$mes        = $_REQUEST['txt-mes'];
$year       = $_REQUEST['txt-year'];
$fecha      = $year."-".$mes."-".$dia;
$bien       = strtoupper($_REQUEST['txt-bien']);
$codNotario = 55;
$idpersonal = $_REQUEST['idpersonal'];

$data = array(
	"codProyecto"=> $proyecto,
	"otorgante"  => $otorgante,
	"favorecido" => $favorecido,
	"fecha"      => $fecha,
	"subserie"   => $serie,
	"folio"      => $folio,
	"escritura"  => $escritura,
	"bien"       => $bien,
	"codNotario" => $codNotario,
	"idpersonal" => $idpersonal
	);


$indices = new Indices();
$res = $indices->Duplicados($data);

if($res == TRUE){

	header("Location: ../view/respuesta.php?msg=Duplicado");
}

if($res == FALSE){

	$indices->Insertar($data);

	header("Location: ../view/respuesta.php?msg=hecho");
}
