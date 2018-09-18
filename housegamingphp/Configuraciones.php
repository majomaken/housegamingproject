<?php
    include 'conexion.php';
    session_start();
    error_reporting(0);

    if (!isset($_SESSION['userr']))
    {
        echo '<script> window.location="index.php"; </script>';
    }

    if (isset($_SESSION['id']))
    {
      $id = $_SESSION['id'];
      $query = "SELECT * FROM user WHERE UsHGTAG='$id'";
      $sql = mysqli_query($Conectar, $query);
      $result = mysqli_fetch_array($sql);
      $nick = $result['UsNickname'];
      $email = $result['UsEmail'];
      $password = $result['UsPassword'];
      $phone = $result['UsPhone'];
    }
//REALIZAR EL UPDATE

    if (isset($_POST['update']))
    {
      $nk=$_POST['nick'];
      $apodo=mysqli_query($Conectar,"UPDATE user SET UsNickname='$nk' where UsHGTAG='$id'");

      $pass=$_POST['Varible_password'];
      $contraseña=mysqli_query($Conectar,"UPDATE user SET UsPassword='$pass' where UsHGTAG='$id'");

      $ph=$_POST['Varibale_phone'];
      $tel=mysqli_query($Conectar,"UPDATE user SET UsPhone='$ph' where UsHGTAG='$id'");

      $team=$_POST['Varible_equipo'];
      $equip=mysqli_query($Conectar,"UPDATE equip SET EquipName='$team' where UsHGTAG='$id'");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel="stylesheet" href="assets/css/stylep.css">
	<link rel="stylesheet" type="text/css" href="assets/css/Conf.css">
  <link rel="stylesheet" type="text/css" href="assets/css/iconos.css">
	<link rel="icon" type="image/jpg" href="../assets/images/iconhg.png">

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<title>Configuraciones</title>
</head>
<body class="body3">
  <div class="contenido abrir">
    <div id="trnegra"></div>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?> "method="POST">
 <fieldset>
 	<label class="Nm">Cambiar nick</label>
 	<input type="text" name="nick" class="inNm" placeholder="Nuevo nick" value="<?php echo $nick; ?>">
 	</label>
 	<label class="Np">Cambiar contraseña</label>
 	<input type="password" name="Varible_password" class="inPs" placeholder="Nueva contraseña" value="<?php echo $password; ?>">
 	<label class="Tl">Cambiar teléfono</label>
 	<input type="number" name="Varibale_phone" class="inTl" placeholder="Teléfono" value="<?php echo $phone; ?>">
 </fieldset>

 <button type="submit" class="Boton" name="update">
 	<span>Guardar cambios!</span>
</button>
 </div>
</form>
  <?php require 'partials/menu.php' ?>
 <script src="http://code.jquery.com/jquery-latest.js"></script>
</body>
</html>
