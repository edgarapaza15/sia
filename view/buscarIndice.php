<?php
session_start();
require_once "header.php";
?>

<div class="container">
  <div class="row">
    <h3 class="alert alert-success">Buscador de Índices - HUANCANE</h3>
  </div>

  <div class="row">
    <div class="col">
      <form class="form-inline" action='buscarTodo.php' method='post' name='fregistro' id='fregistro' role='form'>
        <div class="form-group">
          <button type="submit" name="todo" value="todo" href="#listaIndice.php"  class="btn btn-primary" > <span class="glyphicon glyphicon-search"></span> Buscar Todo</button>
        </div>
      </form>

      <table>
        <thead>
          <tr>
            <th>Descripcion</th>
            <th>form</th>
            <th>Boton</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <form class="form-inline" action='buscarOtorgante.php' method='post' name='fregistro' id='fregistro' role='form'>
              <td><label class="formGroupExampleInput" for="txtOtorgante">Buscar por Otorgante :</label></td>
              <td><input type="search" class="form-control" id="txtOtorgante" name="txtOtorgante" placeholder=""></td>
              <td><button type="submit" name="otorgante" value="otorgante" class="btn btn-primary" > <span class="glyphicon glyphicon-search"></span> Buscar Por Otorgante</button>
</td>
            </form>
          </tr>
          <tr>
            <form class="form-inline" action='buscarFavorecido.php' method='post' name='fregistro' id='fregistro' role='form'>
              <td>Buscar por Favorecido</td>
              <td><input type="text" class="form-control" id="txtFavorecido" name="txtFavorecido" placeholder="">
</td>
              <td><button type="submit" name="favorecido" value="favorecido" class="btn btn-primary" > <span class="glyphicon glyphicon-search"></span> Buscar Por Favorecido</button>
</td>
            </form>
          </tr>
          <tr>
            <form class="form-inline" action='buscarFecha.php' method='post' name='fregistro' id='fregistro' role='form'>
              <td>Buscar por Fecha:</td>
              <td><input type="date" class="form-control" id="txtFecha" name="txtFecha" >
</td>
              <td><button type="submit" name="fecha" value="fecha" class="btn btn-primary" > <span class="glyphicon glyphicon-search"></span> Buscar Por Fecha</button>
</td>
            </form>
          </tr>
          <tr>
            <form class="form-inline" action='buscarBien.php' method='post' name='fregistro' id='fregistro' role='form'>
              <td>Buscar por Nombre del Bien:</td>
              <td><input type="text" class="form-control" id="txtBien" name="txtBien" placeholder="">
</td>
              <td><button type="submit" name="bien" value="bien" class="btn btn-primary" > <span class="glyphicon glyphicon-search"></span> Buscar Por Nombre del Bien</button>
</td>
            </form>
          </tr>

        </tbody>
      </table>
    </div>
  </div>
