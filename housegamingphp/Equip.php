<?php
require 'conexion.php';
session_start();
if (!isset($_SESSION['userr'])) {
    echo '<script> window.location="index.php"; </script>';
}
if (isset($_POST['cteam'])) {
    //Info Variables
    $teamname  = $_POST['teamname'];
    $owner     = $_SESSION['id'];
    $menber2   = $_POST['player2'];
    $menber3   = $_POST['player3'];
    $menber4   = $_POST['player4'];
    $menber5   = $_POST['player5'];
    $menber6   = $_POST['player6'];
    $id        = $_SESSION['id'];
    //Querys
      //Insert EquipName and EquipCreator from HGTAG
    $insert    = "INSERT INTO equip (EquipName, EquipCreator) VALUES ('$teamname', '$owner');";
      //Query HGTAG from EquipCreator
    $query     = "SELECT EquipCreator FROM Equip WHERE EquipCreator='$id';";
    $sql       = mysqli_query($Conectar, $query);
      //Query all fileds from Equip by HGTAG from EquipCreator
    $menbers   = "SELECT * FROM equip WHERE EquipCreator='$id';";
    $menbersv   = mysqli_query($Conectar, $menbers);
    $menbersv  = mysqli_fetch_array($menbersv);
      //Fetch HGTAG Menber2
    $menber2q  = "SELECT UsHGTAG FROM user WHERE UsNickname='$menber2';";
    $menber2ex = mysqli_query($Conectar, $menber2q);
    $menber2ex  = mysqli_fetch_array($menber2ex);
      //Fetch HGTAG Menber3
    $menber3q  = "SELECT UsHGTAG FROM user WHERE UsNickname='$menber3';";
    $menber3ex = mysqli_query($Conectar, $menber3q);
    $menber3ex  = mysqli_fetch_array($menber3ex);
      //Fetch HGTAG Menber4
    $menber4q  = "SELECT UsHGTAG FROM user WHERE UsNickname='$menber4';";
    $menber4ex = mysqli_query($Conectar, $menber4q);
    $menber4ex  = mysqli_fetch_array($menber4ex);
      //Fetch HGTAG Menber5
    $menber5q  = "SELECT UsHGTAG FROM user WHERE UsNickname='$menber5';";
    $menber5ex = mysqli_query($Conectar, $menber5q);
    $menber5ex  = mysqli_fetch_array($menber5ex);
      //Fetch HGTAG Menber6
    $menber6q  = "SELECT UsHGTAG FROM user WHERE UsNickname='$menber6';";
    $menber6ex = mysqli_query($Conectar, $menber6q);
    $menber6ex  = mysqli_fetch_array($menber6ex);

    $idmenber2  = $menber2ex['UsHGTAG'];
    $idmenber3  = $menber3ex['UsHGTAG'];
    $idmenber4  = $menber4ex['UsHGTAG'];
    $idmenber5  = $menber5ex['UsHGTAG'];
    $idmenber6  = $menber6ex['UsHGTAG'];

    //Execute Insert Create Team
    if (empty($sql['EquipCreator'])) {
      $sql = mysqli_query($Conectar, $insert);
      if ($sql == true) {
        echo "Tu equipo a sido creado";

      } else {
        echo "Ya tienes el equipo " . $sqls['EquipName'];
      }
    }
    //Nombre de equipo
    $equipname = "SELECT EquipName FROM equip WHERE EquipCreator='$id';";
    $sqls      = mysqli_query($Conectar, $equipname);
    $sqls      = mysqli_fetch_array($sqls);
    //Validate Field Player2
    if (!empty($menber2)) {
        //Validate if Menber2 is on team
        if ($menbersv['EquipMenber2'] == null ) {
          //Query EquipName from EquipCreator
          $invimsg = "¿Quieres hacer parte de ".$sqls['EquipName']."?";
          $sendinvi  = "INSERT INTO invitations (InviMsg, InviSend, InviReceive) VALUES ('$invimsg', '$id', '$idmenber2')";
          $sql = mysqli_query($Conectar, $sendinvi);
          //Confirm Insert Query
          if ($sql == true) {
            echo 'Invitación enviada';
          }
        } else if ($menbersv['EquipMenber2'] !== null) {
            echo $menber2." ya tiene un equipo.";
        }
    }
    //Validate Field Player3
    if (!empty($menber3)) {
        //Validate if Menber3 is on team
        if ($menbersv['EquipMenber3'] == null) {
          $invimsg = "¿Quieres hacer parte de ".$sqls['EquipName']."?";
          $sendinvi  = "INSERT INTO invitations (InviMsg, InviSend, InviReceive) VALUES ('$invimsg', '$id', '$idmenber3')";
          $sql = mysqli_query($Conectar, $sendinvi);
          //Confirm Insert Query
          if ($sql == true) {
            echo 'Invitación enviada';
          }
        } else if ($menbersv['EquipMenber3'] !== null) {
            echo $menber3." ya tiene un equipo.";
        }
    }
    //Validate Field Player4
    if (!empty($menber4)) {
        //Validate if Menber4 is on team
        if ($menbersv['EquipMenber4'] == null) {
          $invimsg = "¿Quieres hacer parte de ".$sqls['EquipName']."?";
          $sendinvi  = "INSERT INTO invitations (InviMsg, InviSend, InviReceive) VALUES ('$invimsg', '$id', '$idmenber4')";
          $sql = mysqli_query($Conectar, $sendinvi);
          //Confirm Insert Query
          if ($sql == true) {
            echo 'Invitación enviada';
          }
        } else if ($menbersv['EquipMenber4'] !== null) {
            echo $menber4." ya tiene un equipo.";
        }
    }
    //Validate Field Player5
    if (!empty($menber5)) {
        //Validate if Menber5 is on team
        if ($menbersv['EquipMenber5'] == null) {
          $invimsg = "¿Quieres hacer parte de ".$sqls['EquipName']."?";
          $sendinvi  = "INSERT INTO invitations (InviMsg, InviSend, InviReceive) VALUES ('$invimsg', '$id', '$idmenber5')";
          $sql = mysqli_query($Conectar, $sendinvi);
          //Confirm Insert Query
          if ($sql == true) {
            echo 'Invitación enviada';
          }
        } else if ($menbersv['EquipMenber5'] !== null) {
            echo $menber5." ya tiene un equipo.";
        }
    }
    //Validate Field Player6
    if (!empty($menber6)) {
        //Validate if Menber6 is on team
        if ($menbersv['EquipMenber6'] == null) {
          $invimsg = "¿Quieres hacer parte de ".$sqls['EquipName']."?";
          $sendinvi  = "INSERT INTO invitations (InviMsg, InviSend, InviReceive) VALUES ('$invimsg', '$id', '$idmenber6')";
          $sql = mysqli_query($Conectar, $sendinvi);
          //Confirm Insert Query
          if ($sql == true) {
            echo 'Invitación enviada';
          }
        } else if ($menbersv['EquipMenber6'] !== null) {
            echo $menber6." ya tiene un equipo.";
        }
    }

    // if (isset($_POST['cteam'])) {
    //     $insert = "INSERT INTO ";

    //     $Insert=mysqli_query($Conectar,"INSERT INTO  equip (EquipName, EquipCreator, EquipMenber2, EquipMenber3, EquipMenber4, EquipMenber5, EquipMenber6) VALUES ($teamname, $owner, $member1, $member2, $member3, $member4, $member5)");
    // }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/equip.css">
    <link rel="stylesheet" href="assets/css/stylep.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="icon" type="image/jpg" href="../assets/images/iconhg.png">
    <title>Equipo</title>
</head>
    <body class="body3">
      <?php require 'partials/menu.php' ?>
      <div class="contenido abrir">
        <div id="trnegra">
          <label class="crear">CREA TU EQUIPO AHORA</label>
          <form method="post" action="Equip.php">
              <img src="assets/images/Menu.png" class="menu">
                <input type="text" name="teamname" placeholder="Nombre de Equipo" class="teamname">
                <input type="text" name="player2" placeholder="Jugador1" class="player1">
                <input type="text" name="player3" placeholder="Jugador2" class="player2">
                <input type="text" name="player4" placeholder="Jugador3" class="player3">
                <input type="text" name="player5" placeholder="Jugador4" class="player4">
                <input type="text" name="player6" placeholder="Jugador5" class="player5">
            <input type="submit" name="cteam" value="Crear Equipo" class="cteam">
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
<!-- <form class="" action="Equip.php" method="post">
<input type="text" name="player1" placeholder="Jugador1">
<input type="submit" name="invip1" value="Invitar">
</form>
<form class="" action="Equip.php" method="post">
<input type="text" name="player2" placeholder="Jugador2">
<input type="submit" name="invip2" value="Invitar">
</form>
<form class="" action="Equip.php" method="post">
<input type="text" name="player3" placeholder="Jugador3">
<input type="submit" name="invip3" value="Invitar">
</form>
<form class="" action="Equip.php" method="post">
<input type="text" name="player4" placeholder="Jugador4">
<input type="submit" name="invip4" value="Invitar">
</form>
<form class="" action="Equip.php" method="post">
<input type="text" name="player5" placeholder="Jugador5">
<input type="submit" name="invip5" value="Invitar"> -->
