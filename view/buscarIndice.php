<?php
session_start();
include "cabecera.php";
?>

<div class="container">
	<div class="row">
		<h3 class="alert alert-success">Buscador de Índices</h3>
	</div>
	<div class="row">

		<div class="col">

			<?php
			if (isset($_SESSION['mensaje']) AND $_SESSION['mensaje'] != '') {
				?>
				<div class="alert alert-info">
					<?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']);?>
				</div>
				<?php
			}
			?>

			<form class="form-inline" action='buscarTodo.php' method='post' name='fregistro' id='fregistro' role='form'>
				<div class="form-group">
					<div class="">
						<button type="submit" name="todo" value="todo" href="#listaIndice.php"  class="btn btn-primary" > <span class="glyphicon glyphicon-search"></span> Buscar Todo</button>
					</div>
				</div>
			</form>

			<form class="form-inline" action='buscarNotario.php' method='post' name='fregistro' id='fregistro' role='form'>
				<div class="form-group">
					<label class="formGroupExampleInput" for="txtNotario">Buscar por Notario :</label>

						<select class="form-control" id="txtNotario" name="txtNotario" >
							<option value="0">SELECCIONE NOTARIO</option>
							<option value="55">Luis Jimenez Vargas (Huancane)</option>
							<option value="21">Miguel Pino Chavez (Puno)</option>
							<option value="100">Hector Garnica Rosado (Puno)</option>
						</select>


						<button type="submit" name="notario" value="notario" class="btn btn-primary" > <span class="glyphicon glyphicon-search"></span> Buscar Por Notario</button>


				</div>
			</form>

			<form class="form-inline" action='buscarOtorgante.php' method='post' name='fregistro' id='fregistro' role='form'>
				<div class="form-group">
					<label class="formGroupExampleInput" for="txtOtorgante">Buscar por Otorgante :</label>

						<input type="search" class="form-control" id="txtOtorgante" name="txtOtorgante" placeholder="Ingrese el Otorgante">

					<div class="form-group">
						<button type="submit" name="otorgante" value="otorgante" class="btn btn-primary" > <span class="glyphicon glyphicon-search"></span> Buscar Por Otorgante</button>
					</div>
				</div>
			</form>

			<form class="form-inline" action='buscarFavorecido.php' method='post' name='fregistro' id='fregistro' role='form'>
				<div class="form-group">
					<label class="formGroupExampleInput" for="txtFavorecido">Buscar por Favorecido :</label>

						<input type="text" class="form-control" id="txtFavorecido" name="txtFavorecido" placeholder="Ingrese el Favorecido">

						<button type="submit" name="favorecido" value="favorecido" class="btn btn-primary" > <span class="glyphicon glyphicon-search"></span> Buscar Por Favorecido</button>

				</div>
			</form>

			<form class="form-inline" action='buscarFecha.php' method='post' name='fregistro' id='fregistro' role='form'>
				<div class="form-group">
					<label class="formGroupExampleInput" for="txtFecha">Buscar por Fecha :</label>

						<input type="date" class="form-control" id="txtFecha" name="txtFecha" placeholder="<?php echo $fecha = date('Y-m-d');?>" maxlength="10">Formato: Año-Mes-Día

						<button type="submit" name="fecha" value="fecha" class="btn btn-primary" > <span class="glyphicon glyphicon-search"></span> Buscar Por Fecha</button>

				</div>
			</form>

			<form class="form-inline" action='buscarSerie.php' method='post' name='fregistro' id='fregistro' role='form'>
				<div class="form-group">
					<label class="formGroupExampleInput" for="txtSerie">Buscar por Serie :</label>

						<input type="text" class="form-control" id="txtSerie" name="txtSerie" placeholder="Ingrese la Serie">

						<button type="submit" name="serie" value="serie" class="btn btn-primary" > <span class="glyphicon glyphicon-search"></span> Buscar Por Serie</button>

				</div>
			</form>

			<form class="form-inline" action='buscarBien.php' method='post' name='fregistro' id='fregistro' role='form'>
				<div class="form-group">
					<label class="formGroupExampleInput" for="txtBien">Buscar por Nombre del Bien :</label>

						<input type="text" class="form-control" id="txtBien" name="txtBien" placeholder="Ingrese el Nombre del Bien">

						<button type="submit" name="bien" value="bien" class="btn btn-primary" > <span class="glyphicon glyphicon-search"></span> Buscar Por Nombre del Bien</button>

				</div>
			</form>

		</div>

	</div>
</div>

