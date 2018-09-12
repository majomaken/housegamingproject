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
  <script src=" http://localhost:35729/livereload.js"></script>
     <meta charset="utf-8">
     <link rel="stylesheet" type="text/css" href="assets/css/stylep.css">
     <link rel="stylesheet" type="text/css" href="assets/css/internoequip.css">
     <title>Tú equipo</title>
     <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
     <link rel="icon" type="image/jpg" href="../images/iconhg.png">
 </head>
 <body >
   <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
     <?php require 'partials/menu.php' ?>
     <div class="contenido">
       <div class="conteam">
  <label name="Varibale_nombreequipo" class="team">TeamHG</label>
</div>
         <img src="assets/images/Menu.png" class="menu">
         <div class="banner">
         </div>
         <div class="contequipo">
         <img src="teamslogos/Spartan.jpg" class="logoequipo">
       </div>
          <div class="equipos">
          <ul>
            <li class="integrantes">Integrantes de (equipo)</li>
          <li>Miguel (Líder)</li>
          <li>Kevin</li>
          <li>Luis</li>
          <li>Yojan</li>
          <li>Andres</li>
          <li>Santiago</li>
        </ul>
</div>
<div class="blanco">
<div class="fb-comments" data-href="http://localhost/hg/housegamingphp/equipo.php" data-width="950" data-numposts="2"></div>
</div>
</div>

 <script type="text/javascript" src="assets/js/abrir.js"></script>
 </body>
</body>
