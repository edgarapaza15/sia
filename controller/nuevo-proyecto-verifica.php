<?php

function Police()
	{

		$codnotario = $_REQUEST['txtNotario'];
		$fecha      = $_REQUEST['txt-fec_ini'];
		$numIndice  = $_REQUEST['txt-num_ind'];

		include_once "../model/proyectos.model.php";
		$proyecto = new Proyectos();
		$res = $proyecto->Duplicados($codnotario, $numIndice);

		if($res == TRUE){
			$msg ="Ya registrado";
		}
		if($res == FALSE){
			$proyecto->Insertar($codnotario, $numIndice);
			$msg = "Registrado correctamente";
		}

		return $msg;
	}
		header("Location: ../view/respuesta.php?msg=".Police());

?>