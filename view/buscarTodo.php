<?php
session_start();

	require("cabecera.php");

	require_once("../model/Conexion.php");

	//Conexion con Base de Datos
	$conn = new Conexion();
	$link = $conn->Conectar();

	$sql = "SELECT i.codIndice, CONCAT(n.nom_not,' ',n.mat_not,' ',n.pat_not) AS notario,
i.otorgante,i.favorecido,i.fecha,i.subserie,i.folio, i.escritura,i.bien
FROM indices as i, Notario as n
WHERE i.codNotario = n.codNotario LIMIT 1000;";
		//echo $trabajando;

	$result = $link->query($sql);
	$total	= $result->num_rows;

?>

	<div class="container-fluid">

		<div class="row">
			<div class="col-md-12">

			<center><h3>Lista de todos los Índices</h3></center>

			<?php echo "<h4>Número de Índices Encontrados: $total (Solo se muestran 1000 Registros de mas de 6000)</h4> " ?>
					<table class="table table-striped table-bordered table-responsive" >
						<thead>
							<tr>
								<th>Número</th>
								<th>Nombre Notario</th>
								<th>Otorgante</th>
								<th>Favorecido</th>
								<th>Fecha</th>
								<th>Serie</th>
								<th>Folio</th>
								<th>Escritura</th>
								<th>Nombre del Bien</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$_SESSION['oPDF'] = array();

						while ($lista1 = $result->fetch_assoc()) {
						$_SESSION['oPDF'][] = $lista1;
						?>
								<tr>
									<td><?php echo $lista1['codIndice'];?></td>
									<td><?php echo $lista1['notario'];?></td>
									<td><?php echo $lista1['otorgante'];?></td>
									<td><?php echo $lista1['favorecido'];?></td>
									<td><?php echo $lista1['fecha'];?></td>
									<td><?php echo $lista1['subserie'];?></td>
									<td><?php echo $lista1['folio'];?></td>
									<td><?php echo $lista1['escritura'];?></td>
									<td><?php echo $lista1['bien'];?></td>

									<td>
										<a href=""><span class="glyphicon glyphicon-edit "></span>Editar</a>


									</td>
								</tr>
						<?php
						}
						?>
						</tbody>
						<tfoot>

						</tfoot>
					</table>

					<div class="btn-group" role="group" aria-label="...">
						<a href="imprimirBuscarTodo.php" class="btn btn-default" target="_blank"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir Lista</a>

					</div>

			</div>
		</div>

	</div>
