<?php
    include 'conexion.php';
    session_start();
    error_reporting(0);

    if (!isset($_SESSION['userr'])) {
        echo '<script> window.location="index.php"; </script>';
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/stylep.css">
    <title>Tú perfil</title>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="icon" type="image/jpg" href="../images/iconhg.png">
</head>

<body>
  <?php require 'partials/menu.php' ?>
    <div class="contenido">
        <div id="trnegra"></div>
        <img src="assets/images/Menu.png" class="menu">
        <label class="Nt">Noticias recientes</label>
        <div class="n1">
        </div>
        <div class="n2">
        </div>
        <div class="n3">
        </div>
        <div class="n4">
        </div>
        <div class="n5">
        </div>
        <div class="n6">
        </div>
        <div class="dt1">
            <p class="cam">CAMPEONATO MUNDIAL</p>
            El fin de un imperio
        </div>
        <div class="dt2">
            <p class="cam">CAMPEONATO MUNDIAL</p>
            Cuestión de confianza
        </div>
        <div class="dt3">
            <p class="cam">CAMPEONATO MUNDIAL</p>
            La renovación del metajuego
        </div>
        <div class="dt4">
            <p class="cam">JUEGO</p>
            Juega mundo como WHITENIGHT
        </div>
        <div class="dt5">
            <p class="cam">JUEGO</p>
            Juega a kindrer como BROXAH
        </div>
        <div class="dt6">
            <p class="cam">LCS</p>
            Los primeros premios fan
        </div>
    </div>

    <a href="CerrarSesion.php">
      <button type="button" class="Logout">
        <span>Cerrar sesión</span>
      </button>
  </a>
     <script src="http://code.jquery.com/jquery-latest.js"></script>
     <script type="text/javascript" src="assets/js/abrir.js"></script>
</body>
</html>
