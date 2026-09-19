<?php
require_once "header.php";
?>

<div class="container">
    <div class="row">
      <div class="col-md-6">

        <h3>Formulario para el ingreso de nuevo Personal al SIA</h3>
        <form method="post"  action="controller/newpersonal.controller.php">
          <div class="form-group">
            <label for="exampleFormControlInput1">Nombre:</label>
            <input type="text" class="form-control" name="nombre" placeholder="Nombre">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Apellido parteno:</label>
            <input type="text" class="form-control" name="paterno" placeholder="paterno">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Apellido materno:</label>
            <input type="text" class="form-control" name="materno" placeholder="Materno">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">DNI:</label>
            <input type="text" class="form-control" name="dni" placeholder="DNI">
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Tipo</label>
            <select class="form-control" id="exampleFormControlSelect1">
              <option value="2" selected="selected">2 - Personal</option>
              <option value="1">1 - Administrador</option>
            </select>
          </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </form>
      </div>

    </div>
</div>

<?php
include("footer.php");
?>
