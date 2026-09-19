<?php
session_start();
require_once("../model/personal.model.php");

if(!empty($_SESSION['personal']))
{
	require("cabecera.php");


		$personal = new Personal();
		$data = $personal->getPersonal($_SESSION['personal']);

?>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-info">
					<h3>BIENVENIDO AL <span>SIA</span></h3>
					<h3><?php printf("Bienvenido(a): %s", $data['trabajador']); 	?></h3>

				</div>
			</div>
			<div class="col-md-12">
        <h2>Comunicado</h2>
        
        <h3 class="alert alert-success">Ya tenemos 16,205 Escrituras (Luis Jimenez) hasta la fecha
          y del nuevo notario (Jorge Cuentas) 417 Escrituras ingresadas.  Gracias por su trabajo.</h3>

				<a href="listado.php" class="btn btn-success btn-lg">Ingresar Datos</a>

			</div>

		</div>

	</div>

</body>
</html>
<?php
}else{
	header("Location: ../index.html");
}
?>
