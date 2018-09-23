<?php
include 'conexion.php';
session_start();
error_reporting(0);

if (!isset($_SESSION['userr'])) {
    echo '<script> window.location="index.php"; </script>';
}
$id        = $_SESSION['id'];
$query   = "SELECT * FROM equip WHERE EquipCreator='$id' OR EquipMenber2='$id' OR EquipMenber3='$id' OR EquipMenber4='$id' OR EquipMenber5='$id' OR EquipMenber6='$id'";
$menbers = mysqli_query($Conectar, $query);
$menbers = mysqli_fetch_array($menbers);
$ownerteam = "SELECT `user`.UsHGTAG, `user`.UsNickname FROM `user` INNER JOIN equip ON UsHGTAG=EquipCreator WHERE EquipCreator='$id' OR EquipMenber2='$id' OR EquipMenber3='$id' OR EquipMenber4='$id' OR EquipMenber5='$id' OR EquipMenber6='$id';";
$ownexecute = mysqli_query($Conectar, $ownerteam);
$ownexecutes = mysqli_fetch_array($ownexecute);
if (!empty($menbers)) {
$mlead = $menbers['EquipCreator'];
$m2 = $menbers['EquipMenber2'];
$m3 = $menbers['EquipMenber3'];
$m4 = $menbers['EquipMenber4'];
$m5 = $menbers['EquipMenber5'];
$m5 = $menbers['EquipMenber6'];
$teamnicks = "SELECT `user`.UsHGTAG, `user`.UsNickname FROM `user` INNER JOIN equip ON  UsHGTAG=EquipMenber2 OR UsHGTAG=EquipMenber3 OR UsHGTAG=EquipMenber4 OR UsHGTAG=EquipMenber5 OR UsHGTAG=EquipMenber6 WHERE EquipCreator='$mlead';";
$team = mysqli_query($Conectar, $teamnicks);

}
 ?>
 <!DOCTYPE>
 <html>
 <head>
   <meta charset="utf-8">
   <title>Configuraciones</title>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script type="text/javascript" src="assets/js/all.js"></script>
   <script src=" http://localhost:35729/livereload.js"></script>
   <link rel="stylesheet" href="assets/css/stylep.css">
   <link rel="stylesheet" href="assets/css/equipoconfi.css">
   <link rel="stylesheet" type="text/css" href="assets/css/iconos.css">
   <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
 </head>
 <body>
   <?php require 'partials/menu.php' ?>
   <div class="contenido abrir">
     <div id="trnegra"></div>


     <label class="miembros">Integrantes de equipo</label>
     <?php if ($id == $mlead): ?>
<!-- Terminar esta parte -->
         <?php while ($teamnicksex = mysqli_fetch_array($team)) : ?>
           <li></li><input class="m1" type="hideen" value="<?php echo $teamnicksex['UsNickname']; ?>">
           <button type="button" class="eliminar">Expulsar jugador</button>

         <?php endwhile; ?>
     <?php else: ?>
         <li><?php echo $ownexecutes['UsNickname']; ?> (Lider)</li>
         <?php while ($teamnicksex = mysqli_fetch_array($team)) : ?>
             <li> <?= $teamnicksex['UsNickname']; ?> </li>
         <?php endwhile; ?>

     <?php endif; ?>


    <label class="cambio">Cambiar logo de equipo</label>
    <button type="bottom" class="elegir">
      <span>Examinar</span>
    </button>
    <label class="cambioh">Cambiar header de equipo</label>
    <button type="bottom" class="elegirh">
      <span>Examinar</span>
    </button>
    <button id="alert" type="bottom" class="elimininarequipo">
      <span>¡Eliminar equipo!</span>
    </button>
  </div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="assets/js/alert.js"></script>
<script type="text/javascript" src="assets/js/abrir.js"></script>
 </body>
 </html>
