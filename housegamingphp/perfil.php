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
$consulta = mysqli_query($Conectar,"SELECT UsCity FROM user WHERE UsHGTAG='$id'");
$ciudad=mysqli_fetch_array($consulta);
 ?>

<!DOCTYPE html>
<html>
<head>
  <script src="http://localhost:35729/livereload.js"></script>
  <script type="text/javascript" src="assets/js/all.js"></script>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="assets/css/iconos.css">
  <link rel="stylesheet" type="text/css" href="assets/css/stylep.css">
  <link rel="stylesheet" type="text/css" href="assets/css/perfil.css">
   <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <title>Perfil</title>
  <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link rel="icon" type="image/jpg" href="../images/iconhg.png">
</head>
<body class="body1">
  <?php require 'partials/menu.php'?>
  <div class="contenido1">
    <div id="fondo1"></div>
    <div class="negro">
      <img src="assets/images/Menu.png" class="menu">

    <div class="imgd1">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST">
      <?php
        error_reporting(0);
        $id=$_SESSION['id'];
        $sqll=mysqli_query($Conectar,"SELECT AvatarSrc From Avatar INNER JOIN user ON user.UsAvatar=Avatar.AvatarId WHERE UsHGTAG ='$id'");
        $icono=mysqli_fetch_array($sqll);
        echo '<img class="imgd1" src="'.$icono['AvatarSrc'].'" id="modal">';
        $nick=mysqli_query($Conectar,"SELECT UsNickname From user where UsHGTAG='$id'");
        $nickname=mysqli_fetch_array($nick);
      ?>
</div>
<label class="nombre"><h2><?php echo $nickname['UsNickname'];?></label></h2>
</div>
<div class="blanco">
<ul>
  <li><a href="perfil.php"><h2>Información</li></a></h2>
</ul>
</div>
<div class="gris">
  <div id="particles-js"></div>
  <label class="juegos">Juegos y ligas:<br></label>
  <label name="Varibale_equipos" class="lista">-League of legends<br><img src="assets/images/lolr.jpg"><br>-Paladins<br><img class="ligaas"src="assets/images/paladins.jpg"></label>
  <label class="equipo">Equipo:</label><br>
  <label name="Varibale_nombreequipo" class="team"><?php echo $menbers['EquipName'];?></label>
  <label class="ciudadd">Ciudad:</label><br>
  <label class="ciudad"><?php echo $ciudad['UsCity'];?></label>

</div>
</div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="assets/js/abrir.js"></script>
    <script src="Particulas/particles.js"></script>
    <script src="Particulas/particulas.js"></script>
</html>
