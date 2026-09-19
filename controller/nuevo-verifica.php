<?php
include_once "../model/indices.model.php";

$proyecto   = $_REQUEST['codProy'];
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
$codNotario = $_REQUEST['codNot'];
$idpersonal = $_REQUEST['idpersonal'];
$tomo       = strtoupper($_REQUEST['tomo']);
$minuta     = $_REQUEST['minuta'];
$notario    = $_REQUEST['Notario'];


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
  "idpersonal" => $idpersonal,
  "tomo"       => $tomo,
  "minuta"     => $minuta
);

var_dump($data);

$indices = new Indices();
$res = $indices->Duplicados($data);

if($res == TRUE){

	header("Location: ../view/respuesta.php?msg=Duplicado&codProy=".$proyecto."&Notario=".$notario."&codNot=".$codNotario);
}

if($res == FALSE){

	$indices->Insertar($data);

	header("Location: ../view/respuesta.php?msg=hecho&codProy=".$proyecto."&Notario=".$notario."&codNot=".$codNotario);
}
