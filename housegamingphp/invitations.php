<?php
  require 'conexion.php';
  session_start();
  if (!isset($_SESSION['userr'])) {
      echo '<script> window.location="index.php"; </script>';
  }
  $msm = '';
  if (isset($_SESSION['userr'])) {
      $id = $_SESSION['id'];
      $inviquery = "SELECT * FROM invitations WHERE InviReceive='$id' AND InviStatus='PENDING';";
      $inviUs = mysqli_query($Conectar, $inviquery);
      $inviUs = mysqli_fetch_array($inviUs);
      $inviMsg= $inviUs['InviMsg'];
      $inviStatus = $inviUs['InviStatus'];
      $inviUsid = $inviUs['InviSend'];
      $inviUsidR = $inviUs['InviReceive'];

      if ($inviUs['InviReceive'] == $id) {
          $ownersql = "SELECT UsNickname FROM user INNER JOIN invitations ON user.UsHGTAG=invitations.invisend WHERE user.UsHGTAG='$inviUsid';";
          $ownerteam = mysqli_query($Conectar, $ownersql);
          $ownerteam = mysqli_fetch_array($ownerteam);
      }
  }
  if (isset($_POST['accept'])) {
      $equipname = "SELECT EquipName FROM equip WHERE EquipCreator='$inviUsid';";
      $sqls      = mysqli_query($Conectar, $equipname);
      $sqls      = mysqli_fetch_array($sqls);
      //Validacion de pertenecia a un equipo
      $pertenecia = "SELECT * FROM equip WHERE EquipCreator='$id' OR EquipMenber2='$id' OR EquipMenber3='$id' OR EquipMenber4='$id' OR EquipMenber5='$id' OR EquipMenber6='$id'";
      $resultp = mysqli_query($Conectar, $pertenecia);
      $resultp = mysqli_fetch_array($resultp);
      if ($resultp > 0) {
        $msm = "Ya tienes un equipo";
      } else {
        $acept = "UPDATE equip SET EquipMenber2='$id' WHERE EquipCreator='$inviUsid'";
        $Insert = mysqli_query($Conectar, $acept);
        $acepts = "UPDATE invitations SET InviStatus='ACEPTED', InviReply='Me uno a tu team my nigga!!' WHERE InviReceive='$id'";
        mysqli_query($Conectar, $acepts);
        $msm = "Bienvenido a ".$sqls['EquipName'];
      }
  } else if (isset($_POST['rejected'])) {
            $reject = "UPDATE invitations SET InviStatus='REJECTED' WHERE InviReceive='$inviUsidR' ";
            $Insert=mysqli_query($Conectar,$reject);
            $msm = 'Que sad men!';
            header("Location: invitations.php");
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/stylep.css">
    <link rel="stylesheet" href="assets/css/invitaciones.css">

    <script src="http://localhost:35729/livereload.js"></script>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="icon" type="image/jpg" href="../assets/images/iconhg.png">
    <title>Invitaciones</title>
  </head>
  <body class="body3">
    <?php require 'partials/menu.php' ?>
    <div class="contenido">
      <div id="trnegra">
        <form method="post" action="invitations.php">
            <img src="assets/images/Menu.png" class="menu">
            <?php if ($inviStatus == 'PENDING'): ?>
              <p>
              <?php echo "Tienes una invitacón de ".$ownerteam['UsNickname']; ?>
              <?php  echo "$inviMsg"; ?>
            </p>
            <p><?php echo $msm; ?></p>
            <input  class="aceptar" type="submit" name="accept" value="Aceptar">
            <input class="rechazar" type="submit" name="rejected" value="Rechazar">
          
          <?php else : ?>
          <p class="texto" style="color: white;">No tienes invitaciónes</p>
          <?php endif; ?>

        </form>
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
