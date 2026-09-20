<?php
session_start();

require("header.php");

require_once("../model/Conexion.php");

//Conexion con Base de Datos
$conn = new Conexion();
$link = $conn->Conectar();

$otorgante = $_POST["txtOtorgante"];

$sql = "SELECT indices.codIndice,CONCAT(Notario.nom_not,' ',Notario.mat_not,' ',Notario.pat_not) AS notario,indices.otorgante,indices.favorecido,indices.fecha,indices.subserie,indices.folio,indices.escritura,indices.bien
	FROM indices INNER JOIN Notario ON indices.codNotario=Notario.codNotario WHERE indices.otorgante LIKE '%$otorgante%'";


$result = $link->query($sql);
$total  = $result->num_rows;

?>

<div class="container-fluid">

  <div class="row">
    <div class="col-md-12">
      <center><h3>Lista de Índices por Otorgantes</h3></center>
      <?php echo "<h4>Número de Índices Encontrados: $total datos encontrados.</h4> " ?>

      <table class="table table-striped table-bordered table-responsive" >
        <thead>
          <tr>
            <th>Núm</th>
            <th width="350px">Nombre Notario</th>
            <th>Otorgante</th>
            <th>Favorecido</th>
            <th width="150px">Fecha</th>
            <th>Serie</th>
            <th>Folio</th>
            <th>Escritura</th>
            <th>Nombre del Bien</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i = 1;
$_SESSION['oPDF'] = [];
while ($lista1 = $result->fetch_assoc()) {
    $_SESSION['oPDF'][] = $lista1;
    ?>

          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $lista1['notario'];?></td>
            <td><?php echo $lista1['otorgante'];?></td>
            <td><?php echo $lista1['favorecido'];?></td>
            <td><?php echo $lista1['fecha'];?></td>
            <td><?php echo $lista1['subserie'];?></td>
            <td><?php echo $lista1['folio'];?></td>
            <td><?php echo $lista1['escritura'];?></td>
            <td><?php echo $lista1['bien'];?></td>
          </tr>
          <?php
            $i++;
}    ?>
        </tbody>
      </table>

    </div>
  </div>

</div>
