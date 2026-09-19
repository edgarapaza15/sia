<?php
require("../model/revision.model.php");

$codIndice = trim(strtoupper($_POST['codIndice']));
$subserie = trim(strtoupper($_POST['materia']));
$otorgante = trim(strtoupper($_POST['otorgante']));
$favorecido = trim(strtoupper($_POST['favorecido']));
$escritura = trim(strtoupper($_POST['escritura']));
$folio = trim(strtoupper($_POST['folio']));
$fecha = trim(strtoupper($_POST['fecha']));
$bien = trim(strtoupper($_POST['bien']));


$revision = new Revision();
$revision->SaveChanges($codIndice, $otorgante,$favorecido,$fecha,$subserie,$folio,$escritura,$bien);