<?php
session_start();
require_once "header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <h3 class="alert alert-success">Buscador de Índices — Huancané</h3>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <form class="form-inline" action="buscarTodo.php" method="post" name="fregistro_todo" id="fregistro_todo" role="form">
        <button type="submit" name="todo" value="todo" class="btn btn-primary">Buscar todo</button>
      </form>

      <table class="search-grid">
        <thead>
          <tr>
            <th>Descripcion</th>
            <th>form</th>
            <th>Boton</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <form class="form-inline" action="buscarOtorgante.php" method="post" name="fregistro_otorgante" id="fregistro_otorgante" role="form">
              <td><label for="txtOtorgante">Buscar por otorgante</label></td>
              <td><input type="search" class="form-control" id="txtOtorgante" name="txtOtorgante" placeholder="Nombre del otorgante"></td>
              <td><button type="submit" name="otorgante" value="otorgante" class="btn btn-primary">Buscar</button></td>
            </form>
          </tr>
          <tr>
            <form class="form-inline" action="buscarFavorecido.php" method="post" name="fregistro_favorecido" id="fregistro_favorecido" role="form">
              <td><label for="txtFavorecido">Buscar por favorecido</label></td>
              <td><input type="text" class="form-control" id="txtFavorecido" name="txtFavorecido" placeholder="Nombre del favorecido"></td>
              <td><button type="submit" name="favorecido" value="favorecido" class="btn btn-primary">Buscar</button></td>
            </form>
          </tr>
          <tr>
            <form class="form-inline" action="buscarFecha.php" method="post" name="fregistro_fecha" id="fregistro_fecha" role="form">
              <td><label for="txtFecha">Buscar por fecha</label></td>
              <td><input type="date" class="form-control" id="txtFecha" name="txtFecha"></td>
              <td><button type="submit" name="fecha" value="fecha" class="btn btn-primary">Buscar</button></td>
            </form>
          </tr>
          <tr>
            <form class="form-inline" action="buscarBien.php" method="post" name="fregistro_bien" id="fregistro_bien" role="form">
              <td><label for="txtBien">Buscar por nombre del bien</label></td>
              <td><input type="text" class="form-control" id="txtBien" name="txtBien" placeholder="Nombre del bien"></td>
              <td><button type="submit" name="bien" value="bien" class="btn btn-primary">Buscar</button></td>
            </form>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
