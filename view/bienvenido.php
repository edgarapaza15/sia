<?php
session_start();
require_once("../model/personal.model.php");

if (!empty($_SESSION['personal'])) {
    require("header.php");


    $personal = new Personal();
    $data = $personal->getPersonal($_SESSION['personal']);

    ?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="alert alert-info">
					<h3>Bienvenido al <span>SIA</span></h3>
					<p><?php printf("Hola, %s", $data['trabajador']); ?></p>
				</div>
			</div>
			<div class="col-md-12">
        <h2>Comunicado</h2>

        <div class="alert alert-success">
          Ya tenemos 16,205 escrituras (Luis Jiménez) hasta la fecha
          y del nuevo notario (Jorge Cuentas) 417 escrituras ingresadas. Gracias por su trabajo.
        </div>

				<a href="listado.php" class="btn btn-success btn-lg">Ingresar datos</a>
			</div>
		</div>
	</div>

</body>
</html>
<?php
} else {
    header("Location: ../index.html");
}
?>
