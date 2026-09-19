<?php
session_start();
require_once "header.php";

echo $_SESSION['administrador'];

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Panel de Administracion de Personal y Datos de Indices</h2>

            <p>Utilice los menus en la parte superior.</p>
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/capacitacion1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="images/image1-min.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="images/image2-min.jpg" class="d-block w-100" alt="...">
                </div>
              </div>
            </div>

            <br>
            <em>Area de Informatica - Archivo Regional de Puno</em>
        </div>
    </div>
</div>
