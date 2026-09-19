<?php
session_start();
	require("cabecera.php");


    include "../model/notario.model.php";
	$notarios = new Notarios();
	$dat = $notarios->ListadoNotarios();


?>

	<div class="container">
		<div class="row">
			<div class="col-md-6">

				<center><h3>Registro de Nuevo Proyecto</h3></center>
				<?php
					if (isset($_SESSION['mensaje']) AND $_SESSION['mensaje'] != '') {
				?>
				<div class="alert alert-info">
					<?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']);?>
				</div>
				<?php
					}
				?>

				<form class="form-horizontal" method='post' name='fregistro' id='fregistro' action='../controller/nuevo-proyecto-verifica.php' role='form'>

					<div class="form-group">
						<label for="txt-notario" class="">Notario :</label>
						<div class="">
							<select class="form-control" id="txtNotario" name="txtNotario" >
								<option value="0">SELECCIONE NOTARIO</option>
									<?php

									while ($row = $dat->fetch_array()) { ?>
										<option value="<?php echo $row[1]; ?>">
											<?php echo $row[0]; ?>
										</option>
									<?php } ?>

							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="txt-fec_ini" class="">Fecha Inicio :</label>
						<div class="">
							<input type="date" class="form-control" id="txt-fec_ini" name="txt-fec_ini" placeholder="<?php echo $fecha = date('Y-m-d');?>" maxlength="10">Formato: Año-Mes-Día
						</div>
					</div>

					<div class="form-group">
						<label for="txt-num_ind" class="">Numero de Indice :</label>
						<div class="">
							<input type="text" class="form-control" id="txt-num_ind" name="txt-num_ind" placeholder="350" maxlength="35">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-2  ">
							<button type="submit" class="btn btn-primary">Crear Proyecto</button>
						</div>
					</div>

				</form>


			</div>
		</div>

	</div>
