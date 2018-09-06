<?php
  require 'conexion.php';
  session_start();
  if (!isset($_SESSION['userr'])) {
      echo '<script> window.location="index.php"; </script>';
  }
  if (isset($_SESSION['userr'])) {
      $id = $_SESSION['id'];
      $inviquery = "SELECT * FROM invitations WHERE InviReceive='$id';";
      $inviUs = mysqli_query($Conectar, $inviquery);
      $inviUs = mysqli_fetch_array($inviUs);
      $inviMsg= $inviUs['InviMsg'];
      $inviUsid = $inviUs['InviSend'];

      if ($inviUs['InviReceive'] == $id) {
          $ownersql = "SELECT UsNickname FROM user INNER JOIN invitations ON user.UsHGTAG=invitations.invisend WHERE user.UsHGTAG='$inviUsid';";
          $ownerteam = mysqli_query($Conectar, $ownersql);
          $ownerteam = mysqli_fetch_array($ownerteam);

          echo "Tienes una invitacón de ".$ownerteam['UsNickname'];
          echo $inviMsg;
      }
  }
  if (isset($_POST['accept'])) {
      $equipname = "SELECT EquipName FROM equip WHERE EquipCreator='$inviUsid';";
      $sqls      = mysqli_query($Conectar, $equipname);
      $sqls      = mysqli_fetch_array($sqls);
      $acept = "UPDATE equip SET EquipMenber2='$id', InviStatus='ACEPTED', InviReply='Me uno a tu team!' WHERE EquipCreator='$inviUsid'";
      $Insert = mysqli_query($Conectar, $acept);
      if ($Insert == true) {
          echo "Bienvenido a ".$sqls['EquipName'];
      } else {
          echo "Error";
      }
  } else if (isset($_POST['rejected'])) {
            $reject = "UPDATE invitations SET InviStatus='REJECTED' WHERE InviSend='$inviUsid' ";
            $Insert=mysqli_query($Conectar,$reject);
            echo 'Que sad men!';
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/stylep.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="icon" type="image/jpg" href="../assets/images/iconhg.png">
    <title>Invitaciones</title>
  </head>
  <body>
    <?php require 'partials/menu.php' ?>
    <div class="contenido">
      <div id="trnegra">
        <form method="post" action="invitations.php">
            <img src="assets/images/Menu.png" class="menu">
            <?php if(!empty($inviMsg)): ?>
            <input type="submit" name="accept" value="Aceptar">
            <button type="submit" name="rejected">Rechazar</button>
            <?php else : ?>
            <p style="color: white;">No tienes invitaciónes</p>
            <?php endif; ?>
        </form>
      </div>
    </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="assets/js/abrir.js"></script>
  </body>
</html>
