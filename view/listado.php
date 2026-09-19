<?php
session_start();

if(!empty($_SESSION['personal']))
{

require ("cabecera.php");
//llamamos a la clase
require_once "../model/proyectos.model.php";
$proyecto = new Proyectos();
$proyecto->ProyectoAbierto();
$abierto   = $proyecto->ProyectoAbierto();
$cerrado   = $proyecto->ProyectoCerrado();

?>

<style>
  body{
    color: white;
  }
</style>
<div class="container">

	<div class="row">
		<div class="col-md-12">

			<center><h3>Proyectos en Indexación</h3></center>
			<table class="table table-striped table-bordered table-condensed" >
				<thead>
					<tr>
						<th>Notario</th>
						<th>Numero de Indice</th>
						<th>Fec. Creación</th>
						<th>Estado</th>
						<th>Opciones</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$_SESSION['oPDF'] = array();
					while ($lista1 = $abierto->fetch_assoc()):
						$_SESSION['oPDF'][] = $lista1;
						?>
						<tr>
							<td><?php echo $lista1['notario'];?></td>
							<td><?php echo $lista1['numIndice'];?></td>
							<td><?php echo $lista1['fecCreacion'];?></td>
							<td>

								<?php

								switch($lista1['estado'])
								{
								case 'EN REVISION':
									echo "<div class='alert alert-danger'>".$lista1['estado']."</div>";
									break;
								case 'NO CONCLUIDO':
									echo "<div class='alert alert-info'>".$lista1['estado']."</div>";
									break;
								case 'NUEVO':
									echo "<div style='background-color: yellow;color:red;'>".$lista1['estado']."</div>";
									break;
								}

								?>

							</td>
							<td>
								<a href="ingresoIndice.php?codProy=<?php echo $lista1['CodProyecto'];?>&Notario=<?php echo $lista1['notario'];?>&codNot=<?php echo $lista1['codNotario'];?>" class="btn btn-success"><span class="glyphicon glyphicon-edit "></span>Continuar</a>
							</td>
						</tr>
						<?php
					endwhile;
					?>
				</tbody>

			</table>

			<!--
			<div class="btn-group" role="group" disabled="true">
				<a href="listado.imprimir.php" class="btn btn-default" target="_blank" enabled="false"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir Lista</a>

			</div>
			-->



			<center><h3>Proyectos Terminados</h3></center>
			<table class="table table-striped table-bordered table-condensed" >
				<thead>
					<tr>
						<th>Notario</th>
						<th>Numero de Indice</th>
						<th>Fecha de Inicio</th>
						<th>Fecha de Cierre</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$_SESSION['oPDF'] = array();
					while ($lista2 = $cerrado->fetch_assoc()) {
						$_SESSION['oPDF'][] = $lista2;
						?>
						<tr>

							<td><?php echo $lista2['notario'];?></td>
							<td><?php echo $lista2['numIndice'];?></td>
							<td><?php echo $lista2['fecCreacion'];?></td>
							<td><?php echo $lista2['fecTermino'];?></td>

						</tr>
						<?php
					}
					?>
				</tbody>
				<tfoot>

				</tfoot>
			</table>

			<div class="btn-group" role="group" aria-label="...">
				<a href="imprimirProyectosTerminados.php" class="btn btn-default" target="_blank"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir Lista</a>

			</div>

		</div>
	</div>

</div>

<?php

$_SESSION['proyecto'] = $lista1['CodProyecto'];

}else{
	header("Location: ../index.html");
}
?>
