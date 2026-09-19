<?php
require("../model/revision.model.php");

$idindice = $_REQUEST['idindice'];
echo "Id Indice: ".$idindice;

$revision = new Revision();
$revision->ValidarIngreso($idindice);
