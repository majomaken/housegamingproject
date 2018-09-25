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
  <script src="http://localhost:35729/livereload.js"></script>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/iconos.css">
    <link rel="stylesheet" type="text/css" href="assets/css/stylep.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
    <title>eSports</title>
    <script type="text/javascript" src="assets/js/all.js"></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="icon" type="image/jpg" href="../images/iconhg.png">
</head>
<body class="body1">
  <?php require 'partials/menu.php' ?>
    <div class="contenido1">
      <div id="fondo"></div>
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
            <a href="https://eu.lolesports.com/es/articulos/el-fin-de-un-imperio">El fin de un imperio</a>
        </div>
        <div class="dt2">
            <p class="cam">CAMPEONATO MUNDIAL</p>
            <a href="https://eu.lolesports.com/es/articulos/cuestion-de-confianza">Cuestión de confianza</a>
        </div>
        <div class="dt3">
            <p class="cam">CAMPEONATO MUNDIAL</p>
            <a href="https://eu.lolesports.com/es/articulos/la-renovacion-del-metajuego">La renovación del metajuego</a>
        </div>
        <div class="dt4">
            <p class="cam">JUEGO</p>
            <a href="https://eu.lolesports.com/es/articulos/Juega-a-Mundo-como-WhiteKnight">Juega mundo como WHITENIGHT</a>
        </div>
        <div class="dt5">
            <p class="cam">JUEGO</p>
            <a href="https://eu.lolesports.com/es/articulos/Jugad-a-Kindred-como-Broxah">Juega a kindrer como BROXAH</a>
        </div>
        <div class="dt6">
            <p class="cam">LCS</p>
            <a href="https://eu.lolesports.com/es/articulos/Los-primeros-premios-Fan-Favourites">Los primeros premios fan</a>
        </div>
    </div>

     <script src="http://code.jquery.com/jquery-latest.js"></script>
     <script type="text/javascript" src="assets/js/abrir.js"></script>

</body>
</html>
