<?php
session_start();

if(!empty($_SESSION['personal']))
{

  $_SESSION['codProyecto'] = $_REQUEST['codProy'];
  $_SESSION['codNotario'] = $_REQUEST['codNot'];
  $_SESSION['Notario'] = $_REQUEST['Notario'];


	require("cabecera.php");
?>
	<script languaje="text/javascript">
		function justNumbers(e)
		{
			var keynum=window.event ? window.event.keyCode : e.which;
			if((key6um == 8) || (keynum == 46))
				return true;

			return /\d/.test(String.fromCharCode(keynum));

		}
  </script>

<style>
    body,{
        font-size: 18px;
    }
    label{
      color: #6E6E6E;
    }
    .cajas{
      background-color: #FDEBEB;
      border: 2px solid #890926;
      font-size: 18px;
    }
  </style>

	<div class="container">

		<h3>Notario: <?php echo $_REQUEST['Notario'];?></h3>
		<p>
			<?php echo "IdPersonal: ".$_SESSION['personal']; ?>
		</p>

		<form class="form-horizontal" method='post' name='fregistro' id='fregistro' action='../controller/nuevo-verifica.php' role='form'>
		<div class="row">

			<div class="col-md-6">

      <label for="txt-fecha" class="col-xd-12">fecha :</label>
				<div class="form-inline">
					<div class="input-group mb-1 mr-sm-1 mb-sm-0">
						<input type="number" class="form-control cajas" id="txt-dia" name="txt-dia" placeholder="Dia" maxlength="02" min=1 max=99 required>
					</div>
					<div class="input-group mb-1 mr-sm-1 mb-sm-0">
						<select class="form-control cajas" id="txt-mes" name="txt-mes" required>
							<option default>Mes</option>
							<option value="01">Enero</option>
							<option value="02">Febrero</option>
							<option value="03">Marzo</option>
							<option value="04">Abril</option>
							<option value="05">Mayo</option>
							<option value="06">Junio</option>
							<option value="07">Julio</option>
							<option value="08">Agosto</option>
							<option value="09">Setiembre</option>
							<option value="10">Octubre</option>
							<option value="11">Noviembre</option>
							<option value="12">Diciembre</option>

						</select>
					</div>
					<div class="col-md-2">
						<input type="number" class="form-control cajas" id="txt-year" name="txt-year" placeholder="ejm. 1900" min="1900" max="9999" maxlength="4" required>
					</div>
				</div>

        <div class="form-group mb-2">
						<label for="txt-otorgante" class="col-xd-12">Otorgante (Vendedor):</label>
						<div class="col-xd-12">
							<input type="text" class="form-control cajas" id="txt-otorgante" name="txt-otorgante" placeholder="Ingrese Otorgante" required>
						</div>
					</div>

					<div class="form-group mb-2">
						<label for="txt-fovorecido" class="col-xd-12">Favorecido (Comprador):</label>
						<div class="col-xd-12">
							<input type="text" class="form-control cajas" id="txt-favorecido" name="txt-favorecido" placeholder="Ingrese Favorecido - Opcional">
						</div>
          </div>

          <div class="form-group mb-2">
						<label for="tomo" class="col-xd-12">Tomo (Opcional):</label>
						<div class="col-xd-12">
							<input type="text" class="form-control cajas" id="tomo" name="tomo" placeholder="Tomo - Opcional" size="4">
						</div>
          </div>

					<div class="col-md-6">
							<label></label>
							<input type="hidden" id="txt-proyecto" name="txt-proyecto" value="<?php echo $_SESSION['proyecto'];?>">
						</div>
			</div>



			<div class="col-md-6">


      <div class="form-group mb-2">
					<label for="txt-folio" class="col-xd-12">Folio</label>
					<div class="col-xd-12">
						<input type="text" class="form-control cajas" id="txt-folio" name="txt-folio" placeholder="Folio Ejem: 123 Vta" required>
					</div>
        </div>

        <div class="form-group mb-2">
						<label for="txt-escritura" class="col-xd-12">Número de Escritura :</label>
						<div class="col-xd-12">
							<input type="number" onkeypress="return justNumbers(event);" class="form-control cajas" id="txt-escritura" name="txt-escritura" placeholder="# Escritura" min="1" max="999999" maxlength="4" required>
						</div>
          </div>

          <div class="form-group mb-2">
						<label for="minuta" class="col-xd-12">Número de Minuta :</label>
						<div class="col-xd-12">
							<input type="number" onkeypress="return justNumbers(event);" class="form-control cajas" id="minuta" name="minuta" placeholder="# Minuta" required>
						</div>
          </div>


        <div class="form-group mb-2">
						<label for="txt-serie" class="col-xd-12">Objeto del Contrato:</label>
						<div class="col-xd-12">
							<input type="text" class="form-control cajas" id="txt-serie" name="txt-serie" placeholder="Compra Venta- Testamento, Division y Particion" required>

						</div>
					</div>



				<div class="form-group mb-2">
					<label for="txt-bien" class="col-md-6">Nombre del Bien :</label>
					<div class="col-xs-12 col-md-12">
						<input type="text" class="form-control cajas" id="txt-bien" name="txt-bien" placeholder="Ingrese Nombre del Bien - opcional">
					</div>
				</div>

				<!-- Codigo del Personal -->
        <input type="text" name="idpersonal" value="<?php echo $_SESSION['personal']; ?>">
        <input type="text" name="codNot" value="<?php echo $_SESSION['codNotario']; ?>">
        <input type="text" name="codProy" value="<?php echo $_SESSION['codProyecto']; ?>">
        <input type="text" name="Notario" value="<?php echo $_SESSION['Notario']; ?>">


				<div class="form-group mb-2">
					<div class="col-sm-offset-2 col-sm-6 ">
						<button type="submit" class="btn btn-primary my-2 my-sm-0">Guardar datos</button>

					</div>
				</div>

			</div>

		</div>
	</form>

	</div>

	<?php
				if (isset($_SESSION['mensaje']) AND $_SESSION['mensaje'] != "") {
					?>
					<div class="alert alert-info">
						<?php echo $_SESSION['mensaje']; unset($_SESSION['mensaje']);?>
					</div>
<?php
				}

}else{
	header("Location: ../index.html");
}
?>

