<?php
require 'conexion.php';
session_start();
if (!isset($_SESSION['userr'])) {
    echo '<script> window.location="index.php"; </script>';
}
//Query HGTAG from EquipCreator
$id        = $_SESSION['id'];
$query     = "SELECT * FROM equip WHERE EquipCreator='$id' OR EquipMenber2='$id' OR EquipMenber3='$id' OR EquipMenber4='$id' OR EquipMenber5='$id' OR EquipMenber6='$id';";
$sql       = mysqli_query($Conectar, $query);
$sql       = mysqli_fetch_array($sql);
$msm       =  "";

if (isset($_POST['cteam'])) {
    //Info Variables
    $teamname  = $_POST['teamname'];
    $owner     = $_SESSION['id'];
    $menber2   = $_POST['player2'];
    $menber3   = $_POST['player3'];
    $menber4   = $_POST['player4'];
    $menber5   = $_POST['player5'];
    $menber6   = $_POST['player6'];

    //Querys
      //Insert EquipName and EquipCreator from HGTAG
    $insert    = "INSERT INTO equip (EquipName, EquipCreator) VALUES ('$teamname', '$owner');";
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

    //Validación de existencia en la base de datos
    $sqlexist = "SELECT UsNickname FROM user WHERE UsHGTAG='$menber2' OR UsHGTAG='$menber3' OR UsHGTAG='$menber4' OR UsHGTAG='$menber5' OR UsHGTAG='$menber6';";
    $exisitexecute = mysqli_query($Conectar, $sqlexist);
    $exist = mysqli_fetch_array($exisitexecute);

    $equipname = "SELECT EquipName FROM equip WHERE EquipCreator='$id';";
    $sqls      = mysqli_query($Conectar, $equipname);
    $sqls      = mysqli_fetch_array($sqls);

    if (!empty($sqls['EquipName'])) {
      $msm = "Ya tienes el equipo ".$sqls['EquipName'];
    }
    if (!isset($sql['EquipCreator']) && !empty($teamname)) {
      $sql = mysqli_query($Conectar, $insert);
      if ($sql == true) {
        //Nombre de equipo
        $equipname = "SELECT EquipName FROM equip WHERE EquipCreator='$id';";
        $sqls      = mysqli_query($Conectar, $equipname);
        $sqls      = mysqli_fetch_array($sqls);
        //Validación para que no se envie mas de una consulta
        $validateinvie = "SELECT InviStatus FROM invitations WHERE InviReceive = '$id';";
        $validateinvieExe = mysqli_query($Conectar, $validateinvie);
        $validateinvieExe = mysqli_fetch_array($validateinvieExe);
        //Validate Field Player2
        if (!empty($menber2)) {
            //Validate if Menber2 is on team
            if ($menbersv['EquipMenber2'] == null ) {
                //Validación para que no se envie mas de una consulta
                if ($validateinvieExe['InviStatus'] !== null || $validateinvieExe['InviStatus'] !=='PENDING' || $validateinvieExe['InviStatus'] !=='ACEPTED') {
                    //Query EquipName from EquipCreator
                    $invimsg = "¿Quieres hacer parte de ".$sqls['EquipName']."?";
                    $sendinvi  = "INSERT INTO invitations (InviMsg, InviSend, InviReceive,InviStatus) VALUES ('$invimsg', '$id', '$idmenber2','PENDING')";
                    $sql = mysqli_query($Conectar, $sendinvi);
                    //Confirm Insert Query
                    if ($sql == true) {
                      echo 'Invitación enviada';
                    } else {
                            echo 'Este jugador ya tiene un equipo';
                    }
              }
            } else if ($menbersv['EquipMenber2'] !== null) {
                echo $menber2." ya tiene un equipo.";
            }
        }
        //Validate Field Player3
        if (!empty($menber3)) {
            //Validate if Menber3 is on team
            if ($menbersv['EquipMenber3'] == null ) {
                //Validación para que no se envie mas de una consulta
                if ($validateinvieExe['InviStatus'] !== null || $validateinvieExe['InviStatus'] !=='PENDING' || $validateinvieExe['InviStatus'] !=='ACEPTED') {
                    //Query EquipName from EquipCreator
                    $invimsg = "¿Quieres hacer parte de ".$sqls['EquipName']."?";
                    $sendinvi  = "INSERT INTO invitations (InviMsg, InviSend, InviReceive,InviStatus) VALUES ('$invimsg', '$id', '$idmenber3','PENDING')";
                    $sql = mysqli_query($Conectar, $sendinvi);
                    //Confirm Insert Query
                    if ($sql == true) {
                      echo 'Invitación enviada';
                    } else {
                            echo 'Este jugador ya tiene un equipo';
                    }
              }
            } else if ($menbersv['EquipMenber3'] !== null) {
                echo $menber3." ya tiene un equipo.";
            }
        }
        //Validate Field Player4
        if (!empty($menber4)) {
            //Validate if Menber4 is on team
            if ($menbersv['EquipMenber4'] == null ) {
                //Validación para que no se envie mas de una consulta
                if ($validateinvieExe['InviStatus'] !== null || $validateinvieExe['InviStatus'] !=='PENDING' || $validateinvieExe['InviStatus'] !=='ACEPTED') {
                    //Query EquipName from EquipCreator
                    $invimsg = "¿Quieres hacer parte de ".$sqls['EquipName']."?";
                    $sendinvi  = "INSERT INTO invitations (InviMsg, InviSend, InviReceive,InviStatus) VALUES ('$invimsg', '$id', '$idmenber4','PENDING')";
                    $sql = mysqli_query($Conectar, $sendinvi);
                    //Confirm Insert Query
                    if ($sql == true) {
                      echo 'Invitación enviada';
                    } else {
                            echo 'Este jugador ya tiene un equipo';
                    }
              }
            } else if ($menbersv['EquipMenber4'] !== null) {
                echo $menber4." ya tiene un equipo.";
            }

        }
        //Validate Field Player5
        if (!empty($menber5)) {
            //Validate if Menber5 is on team
            if ($menbersv['EquipMenber5'] == null ) {
                //Validación para que no se envie mas de una consulta
                if ($validateinvieExe['InviStatus'] !== null || $validateinvieExe['InviStatus'] !=='PENDING' || $validateinvieExe['InviStatus'] !=='ACEPTED') {
                    //Query EquipName from EquipCreator
                    $invimsg = "¿Quieres hacer parte de ".$sqls['EquipName']."?";
                    $sendinvi  = "INSERT INTO invitations (InviMsg, InviSend, InviReceive,InviStatus) VALUES ('$invimsg', '$id', '$idmenber5','PENDING')";
                    $sql = mysqli_query($Conectar, $sendinvi);
                    //Confirm Insert Query
                    if ($sql == true) {
                      echo 'Invitación enviada';
                    } else {
                            echo 'Este jugador ya tiene un equipo';
                    }
              }
            } else if ($menbersv['EquipMenber5'] !== null) {
                echo $menber5." ya tiene un equipo.";
            }
        }
        //Validate Field Player6
        if (!empty($menber6)) {
            //Validate if Menber6 is on team
            if ($menbersv['EquipMenber6'] == null ) {
                //Validación para que no se envie mas de una consulta
                if ($validateinvieExe['InviStatus'] !== null || $validateinvieExe['InviStatus'] !=='PENDING' || $validateinvieExe['InviStatus'] !=='ACEPTED') {
                    //Query EquipName from EquipCreator
                    $invimsg = "¿Quieres hacer parte de ".$sqls['EquipName']."?";
                    $sendinvi  = "INSERT INTO invitations (InviMsg, InviSend, InviReceive,InviStatus) VALUES ('$invimsg', '$id', '$idmenber6','PENDING')";
                    $sql = mysqli_query($Conectar, $sendinvi);
                    //Confirm Insert Query
                    if ($sql == true) {
                      echo 'Invitación enviada';
                    } else {
                            echo 'Este jugador ya tiene un equipo';
                    }
              }
            } else if ($menbersv['EquipMenber6'] !== null) {
                echo $menber6." ya tiene un equipo.";
            }
        }
        echo "Tu equipo a sido creado";
        header ("Location: equipo.php");

      }
    } else {
          $msm = "Llena el Nombre de Equipo";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/css/equip.css">
    <link rel="stylesheet" type="text/css" href="assets/css/stylep.css">
    <link rel="stylesheet" type="text/css" href="assets/css/iconos.css">
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="icon" type="image/jpg" href="../assets/images/iconhg.png">
    <title>Equipo</title>
</head>
    <body class="body3">
      <div class="contenido abrir">
        <div id="trnegra">
        </div>
          <?php if($sql['EquipCreator'] == $id || $sql['EquipMenber2'] == $id  || $sql['EquipMenber3'] == $id || $sql['EquipMenber4'] == $id || $sql['EquipMenber5'] == $id || $sql['EquipMenber6'] == $id): ?>
            <?php header("Location: equipo.php"); ?>
            <?php else: ?>
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
            <?php endif; ?>
            <p style="color: white;"><?= $msm;  ?></p>
            <p style="color: white;"><?= $msm;  ?></p>

      </div>
      <?php require 'partials/menu.php' ?>
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
