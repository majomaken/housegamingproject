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

    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <link rel="stylesheet" href="assets/css/stylep.css">
	<link rel="stylesheet" type="text/css" href="assets/css/Conf.css">
	<link rel="icon" type="image/jpg" href="../assets/images/iconhg.png">
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<title>Configuraciones</title>
</head>
<body>
	<div class="left-panel">
		<ul>
	<div class="imgd">
    <img class="imgd" src="Avatar/coconut.png" alt="">
	</div>
	<label class="Nombre"><h2><?php echo "Welcome ". $_SESSION['userr']; echo '<img src="'.$_SESSION['Imagen'].'" width="40" heigth="40"><br/>';?></label></h2>
			<li><a href="esports.php">Noticias</li></a>
			<li><a href="">Equipo</li></a>
			<li><a href="">Invitaciones</li></a>
			<li><a href="">Configuraciones</li></a>
		</ul>
	</div>
 <div class="contenido">
 	<div id="trnegra"></div>
 	<img src="assets/images/Menu.png" class="menu">
 <fieldset>
 	<label class="Nm">Cambiar nick</label>
 	<input type="text" name="nick" class="inNm" placeholder="Nuevo nick" value="<?php echo $nick; ?>">
 	</label>
 	<label class="Np">Cambiar contraseña</label>
 	<input type="password" name="Varible_password" class="inPs" placeholder="Nueva contraseña" value="<?php echo $password; ?>">
 	<label class="Tl">Cambiar teléfono</label>
 	<input type="number" name="Varibale_phone" class="inTl" placeholder="Teléfono" value="<?php echo $phone; ?>">
 </fieldset>
 <fieldset>
 	<label class="Ne">Cambiar equipo</label>
 	<input type="text" name="Varible_equipo" class="inNe" placeholder="Equipo" value="">
 </fieldset>
 <button type="submit" class="Boton" name="update">
 	<span>¡Vamos!</span>
</button>
 </div>
 <a href="CerrarSesion.php">
      <button type="button" class="Logout">
        <span>Cerrar sesión</span>
      </button>
  </a>

</button>
 <script src="http://code.jquery.com/jquery-latest.js"></script>
     <script type="text/javascript" src="assets/js/abrir.js"></script>
</body>
</html>
