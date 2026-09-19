<?php
  include "header.php";
  include_once "model/revision.model.php";

  $idindice = $_REQUEST['idindice'];

  $revision = new Revision();
  $data = $revision->RevisarEscritura($idindice);

?>

<div class="container">
  <div class="row">
    <div class="col">
      <h2>
        Modificar los datos Ingresados
      </h2>
    </div>
    <div class="col">
      Cambio de datos
    </div>
  </div>

  <div class="row">
    <div class="col-10">

      <div id="respuesta" class="alert alert-success"></div>

      <form action="" method="post" id="frmChange">
        <table class="table">
          <tr>
            <td width="150">Materia</td>
            <input type="text" name="codIndice" id="codIndice" value="<?php echo $idindice;?>">
            <td><input type="text" name="materia" class="form-control" value="<?php echo $data['subserie'];?>"></td>
          </tr>
          <tr>
            <td>Otorgante</td>
            <td><input type="text" name="otorgante" class="form-control" value="<?php echo $data['otorgante'];?>"></td>
          </tr>
          <tr>
            <td>Favorecido</td>
            <td><input type="text" name="favorecido" class="form-control" value="<?php echo $data['favorecido'];?>"></td>
          </tr>

          <tr>
            <td>Num. Escritura</td>
            <td><input type="number" name="escritura" class="form-control col-2" value="<?php echo $data['escritura'];?>"></td>
          </tr>
          <tr>
            <td>Folio</td>
            <td><input type="text" name="folio" class="form-control col-2" value="<?php echo $data['folio'];?>"></td>
          </tr>
          <tr>
            <td>Fecha</td>
            <td><input type="date" name="fecha" class="form-control col-4" value="<?php echo $data['fecha'];?>"></td>
          </tr>
          <tr>
            <td>Bien</td>
            <td><input type="text" name="bien" class="form-control" value="<?php echo $data['bien'];?>"></td>
          </tr>
          <tr>
            <td><a href="revision.php" class="btn btn-danger" id="btnCancelar"><span id="texto">Cancelar</span> </a></td>
            <td><button type="submit" id="btnSaveChanges" class="btn btn-success">Guardar Cambios</button></td>
            <td><button type="button" id="btnSaveClose" class="btn btn-info">Guardar Cambios y cerrar</button></td>

          </tr>

        </table>
      </form>
    </div>
  </div>

</div>

<script type="text/javascript">

var btnEnviar = document.querySelector("#btnSaveChanges");
var btnAtras = document.querySelector("#texto");

  $(document).ready(function(){

    $("#btnSaveChanges").click(function(event){
      event.preventDefault();

      $.ajax({
        type: "POST",
        url: "./controller/change.controller.php",
        data: $("#frmChange").serialize(),

        success: function(data){
          btnEnviar.innerText = "Enviado";
          btnEnviar.disabled = true;

          btnAtras.innerText = "Regresar Atras";

          $("#respuesta").empty();
          //$("#respuesta").html(data);
          $("#respuesta").html('Registro Verificado y guardado').show(200).delay(2500).hide(200);

        },
        error: function(){
            alert("error al hacer consulta");
        }
      });
    });


    $("#btnSaveClose").click(function (event) {
      event.preventDefault();
      var codigo = $("#codIndice").val();
      console.log(codigo);

      $.ajax({
        type: "POST",
        url: "./controller/revision.controller.php",
        data: {"idindice": codigo},
        success: function(data){
          $("#respuesta").empty();
          //$("#respuesta").html(data);
          $("#respuesta").html('Registro Verificado y guardado').show(200).delay(2500).hide(200);
        },
        error: function(){
          alert("error al hacer consulta");
        }
      });

    });

  });

</script>
