<?php
require_once "header.php";
require_once "./model/reportes.model.php";

$reportes = new Reportes();
$data = $reportes->getListPersonal();

$year = $_GET['year'];
$mes = $_GET['mes'];
$personal = $_GET['personal'];
$fecha_inicio = $_GET['fecha_inicio'];
$fecha_final = $_GET['fecha_final'];

?>
<style>
  body{
    background-color: #193549;
    color: white;
  }
</style>

<div class="container">
  <div class="row">
    <h1>Reportes</h1>
  </div>

  <!-- COLUMAN IZQUIERDA OPCIONES DE BUSQUEDA -->
  <div class="row">
    <div class="col-3">
      <p>Opciones de busqueda</p>
      <form action="" method="get">
        <label for="año">Seleccione Año</label>
        <select name="year" id="year" class="form-control">
          <option value="2020">2020</option>
        </select>

        <label for="mes">Seleccione mes</label>
        <select name="mes" id="mes" class="form-control">
          <option value="01">Enero</option>
          <option value="02">Febrero</option>
          <option value="03">Marzo</option>
          <option value="04">Abril</option>
          <option value="05">Mayo</option>
          <option value="06">Junio</option>
          <option value="07">Julio</option>
          <option value="08">Agosto</option>
          <option value="09">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
        </select>

        <label for="año">Trabajador:</label>
        <select name="personal" id="personal" class="form-control">
          <option value="all">Todos</option>
          <?php
          while ($fila = $data->fetch_array(MYSQLI_ASSOC)):
          ?>
          <option value="<?php echo $fila['cod_usu'];?>"><?php echo $fila['trabajador'];?></option>
          <?php
          endwhile;
          ?>
        </select>
        <br>
        <button type="submit" name="btnQueryMes" id="btnQueryMes" class="btn btn-primary">Buscar por Mes</button>

        <p>Por Rango de Fechas</p>
        Del: <input name="fecha_inicio" id="fecha_inicio" type="date">
        <br>
        Al  : <input name="fecha_final" id="fecha_final" type="date">
        <br>
        <button type="submit" name="btnQueryFechas" id="btnQueryFechas" class="btn btn-primary">Buscar por Fechas</button>

      </form>
    </div>


    <!-- Columna de reportes DERECHA -->
    <div class="col-9">
    <?php
    if (isset($_REQUEST['btnQueryMes'])) {

        if ($personal == "all") {

            echo "Buscando todos";

            $todos = $reportes->TotalRegistros($mes);
        ?>
            <h3>Reporte global - Todos los trabajadores</h3>
            <p>MES:  <strong><?php echo $mes; ?> </strong></p>

            <table class="table">
                <tr>
                    <th>Num</th>
                    <th>Cod. Personal</th>
                    <th>Total Registros</th>
                    <th>Trabajador</th>
                </tr>
                <?php
                $i = 1;
                while ($row = $todos->fetch_array(MYSQLI_ASSOC)):
                //idpersonal,total,trabajador

                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['idpersonal'];?></td>
                    <td><?php echo $row['personal'];?></td>
                    <td><?php echo $row['total'];?></td>

                </tr>

                <?php $i++; endwhile;?>
            </table>
        <?php

        }else{

            $total = $reportes->TotalRegistrosxTrabajador($personal, $mes);
            $persona = $reportes->NombreTrabajador($personal);
            $detalle = $reportes->DetalleRegistrosPersonal($personal, $mes);
        ?>
            <h3>Reporte: <?php echo $persona['personal'];?></h3>
            <p>Cantidad reportada:  <strong><?php echo $total['total'];?> </strong>ingresos</p>

            <table class="table">
                <tr>
                <th>Num</th>
                <th>Cod. Indice</th>
                <th>Escritura</th>
                <th>Proyecto</th>
                <th>Fecha Ingreso</th>
                <th>Corregido?</th>
                <th>Revisado?</th>
                </tr>
                <?php
                $i = 1;
                while ($fila = $detalle->fetch_array(MYSQLI_ASSOC)):
                //codIndice, escritura, codProyecto, fecCreate, corregido, revisado

                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $fila['codIndice'];?></td>
                    <td><?php echo $fila['escritura'];?></td>
                    <td><?php echo $fila['codProyecto'];?></td>
                    <td><?php echo $fila['fecCreate'];?></td>
                    <td><?php
                    //echo $fila['corregido'];
                    if ($fila['corregido'] == 0){
                    echo "<span class='alert bg-danger'>No</span>";
                    }else{
                    echo "<span class='alert bg-success'>Si</span>";
                    }
                    ?></td>
                    <td><?php
                    //echo $fila['revisado'];
                    if ($fila['revisado'] == 0){
                    echo "<span class='alert bg-danger'>No</span>";
                    }else{
                    echo "<span class='alert bg-success'>Si</span>";
                    }
                    ?></td>
                </tr>

                <?php $i++; endwhile;?>
            </table>
        <?php
        }
    }

    if (isset($_REQUEST['btnQueryFechas'])) {
        echo "Busqueda por FECHA: Del  ". $fecha_inicio." al ". $fecha_final;

        if ($fecha_inicio != "" || $fecha_final != "")
        {
            if ($fecha_final == "") {
                $totalfecha1 =$reportes->TotalUnaFecha($personal, $fecha_inicio);
                $detallefecha1 = $reportes->DetalleUnaFecha($personal, $fecha_inicio);
        ?>
            <h3>Reporte: <?php echo $persona['personal'];?></h3>
            <p>Cantidad reportada:  <strong><?php echo $totalfecha1['total']; ?> </strong>ingresos</p>

            <table class="table">
                <tr>
                <th>Num</th>
                <th>Cod. Indice</th>
                <th>Escritura</th>
                <th>Proyecto</th>
                <th>Fecha Ingreso</th>
                <th>Corregido?</th>
                <th>Revisado?</th>
                </tr>
                <?php
                $i = 1;
                while ($fila = $detallefecha1->fetch_array(MYSQLI_ASSOC)):
                //codIndice, escritura, codProyecto, fecCreate, corregido, revisado

                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $fila['codIndice'];?></td>
                    <td><?php echo $fila['escritura'];?></td>
                    <td><?php echo $fila['codProyecto'];?></td>
                    <td><?php echo $fila['fecCreate'];?></td>
                    <td><?php
                    //echo $fila['corregido'];
                    if ($fila['corregido'] == 0){
                    echo "<span class='alert bg-danger'>No</span>";
                    }else{
                    echo "<span class='alert bg-success'>Si</span>";
                    }
                    ?></td>
                    <td><?php
                    //echo $fila['revisado'];
                    if ($fila['revisado'] == 0){
                    echo "<span class='alert bg-danger'>No</span>";
                    }else{
                    echo "<span class='alert bg-success'>Si</span>";
                    }
                    ?></td>
                </tr>

                <?php $i++; endwhile;?>
            </table>
        <?php


            }else{
              //echo "Ambas fechas";
              $totalfecha2 = $reportes->TotalDosFecha($personal, $fecha_inicio, $fecha_final);
              $detallefecha2 = $reportes->DetalleDosFecha($personal, $fecha_inicio, $fecha_final);

            ?>
              <h3>Reporte: <?php echo $persona['personal'];?></h3>
              <p>Cantidad reportada:  <strong><?php echo $totalfecha2['total']; ?> </strong>ingresos</p>

              <table class="table">
                  <tr>
                  <th>Num</th>
                  <th>Cod. Indice</th>
                  <th>Escritura</th>
                  <th>Proyecto</th>
                  <th>Fecha Ingreso</th>
                  <th>Corregido?</th>
                  <th>Revisado?</th>
                  </tr>
                  <?php
                  $i = 1;
                  while ($fila2 = $detallefecha2->fetch_array(MYSQLI_ASSOC)):
                  //codIndice, escritura, codProyecto, fecCreate, corregido, revisado

                  ?>
                  <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $fila2['codIndice'];?></td>
                      <td><?php echo $fila2['escritura'];?></td>
                      <td><?php echo $fila2['codProyecto'];?></td>
                      <td><?php echo $fila2['fecCreate'];?></td>
                      <td><?php
                      //echo $fila['corregido'];
                      if ($fila['corregido'] == 0){
                      echo "<span class='alert bg-danger'>No</span>";
                      }else{
                      echo "<span class='alert bg-success'>Si</span>";
                      }
                      ?></td>
                      <td><?php
                      //echo $fila['revisado'];
                      if ($fila['revisado'] == 0){
                      echo "<span class='alert bg-danger'>No</span>";
                      }else{
                      echo "<span class='alert bg-success'>Si</span>";
                      }
                      ?></td>
                  </tr>

                  <?php $i++; endwhile;?>
              </table>
            <?php
            }

        }else{
            echo "Debe seleccionar una fecha y un Trabajador";
        }
    }
    ?>

    </div>
  </div>
</div>


