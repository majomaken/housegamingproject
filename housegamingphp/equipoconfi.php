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

$newplayer = $_POST['newplayer'];
//Fetch HGTAG Menber2
$menber2q  = "SELECT UsHGTAG FROM user WHERE UsNickname='$newplayer';";
$menber2ex = mysqli_query($Conectar, $menber2q);
$menber2ex  = mysqli_fetch_array($menber2ex);
$idmenber2  = $menber2ex['UsHGTAG'];

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
//Validación para que no se envie mas de una consulta
$validateinvie = "SELECT * FROM invitations WHERE InviReceive = '$idmenber2' AND InviSend = '$id';";
$validateinvieExe = mysqli_query($Conectar, $validateinvie);
$validateinvieExe = mysqli_fetch_array($validateinvieExe);
//Validación de un nuevo Jugador
if (isset($_POST['invi'])) {
  //Nombre de equipo
  $equipname = "SELECT EquipName FROM equip WHERE EquipCreator='$id';";
  $sqls      = mysqli_query($Conectar, $equipname);
  $sqls      = mysqli_fetch_array($sqls);
  if (!empty($newplayer)) {
      //Validate if Menber2 is on team
      if ($menbers['EquipMenber2'] == null ) {
          //Validación para que no se envie mas de una consulta
          if ($validateinvieExe['InviStatus'] !=='PENDING' && $validateinvieExe['InviStatus'] !=='ACEPTED') {
              //Query EquipName from EquipCreator
              $invimsg = "¿Quieres hacer parte de ".$sqls['EquipName']."?";
              $sendinvi  = "INSERT INTO invitations (InviMsg, InviSend, InviReceive,InviStatus) VALUES ('$invimsg', '$id', '$idmenber2','PENDING')";
              $sql = mysqli_query($Conectar, $sendinvi);
              //Confirm Insert Query
        }
        if ($sql == true) {
          $msmInvi = 'Invitación enviada';
        }  else {
          $msmInvi = 'No puedes enviar mas de una invitación al mismo jugador';
        }
      } else if ($menbers['EquipMenber2'] !== null) {
          $msmInvi = $newplayer." ya tiene un equipo!";
      }
    }
}
if (isset($_POST['delete'])) {
    $delete = "DELETE FROM `equip` WHERE `equip`.`EquipId` = '$id';";
    $deleteteam = mysqli_query($Conectar, $delete);
}
  if ($deleteteam = true)
  {
    $delmsm = "El equipo".$sqls['EquipName']." a sido eliminado correctamente";
  }
 ?>
 <!DOCTYPE>
 <html>
 <head>
   <meta charset="utf-8">
   <title>Configuraciones</title>
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

     <img src="assets/images/Menu.png" class="menu">

     <label class="miembros">Integrantes de equipo</label>
     <p class="msm"><?= $msmInvi; ?></p>
     <form  action="equipoconfi.php" method="post">

       <input class="invit" type="text" name="newplayer" placeholder="Nick nuevo jugador"/>
       <input type="submit" class="invitSend" value="Invitar!" name="invi"/>

</form>
     <?php if ($id == $mlead): ?>
<!-- Terminar esta parte -->
         <?php while ($teamnicksex = mysqli_fetch_array($team)) : ?>
           <li></li><input class="m1" type="text" value="<?php echo $teamnicksex['UsNickname']; ?>">
           <button type="button" class="eliminar">Expulsar jugador</button>

         <?php endwhile; ?>
     <?php else: ?>
         <li><?php echo $ownexecutes['UsNickname']; ?> (Lider)</li>
         <?php while ($teamnicksex = mysqli_fetch_array($team)) : ?>
           <input class="m1" type="text" value="<?php echo $teamnicksex['UsNickname']; ?>">
           <button type="submit" class="eliminar">Expulsar jugador</button>         <?php endwhile; ?>

     <?php endif; ?>


    <label class="cambio">Cambiar logo de equipo</label>
    <button type="bottom" class="elegir">
      <span>Examinar</span>
    </button>
    <label class="cambioh">Cambiar header de equipo</label>
    <button type="bottom" class="elegirh">
      <span>Examinar</span>
    </button>

    <input type="submit" class="elimininarequipo" value="¡Eliminar equipo!" name="delete">
    <p class="msm"><?= $delmsm; ?></p>
  </div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript" src="assets/js/abrir.js"></script>
 </body>
 </html>
