<?php
    require 'conexion.php';
    session_start();
    error_reporting(0);

    if (!isset($_SESSION['userr'])) {
        echo '<script> window.location="index.php"; </script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Conf.css">
	<link rel="icon" type="image/jpg" href="../images/iconhg.png">
	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="abrir.js"></script>
	<title>Configuraciones</title>
</head>
<body>
	<div class="left-panel">
		<ul>
	<div class="imgd">

	</div>
	<label class="Nombre"><h2><?php echo "Welcome ". $_SESSION['userr']; echo '<img src="'.$_SESSION['Imagen'].'" width="40" heigth="40"><br/>';?></label></h2>
			<li><a href="esports.html">Noticias</li></a>
			<li><a href="">Equipo</li></a>
			<li><a href="">Invitaciones</li></a>
			<li><a href="">Configuraciones</li></a>
		</ul>
	</div>
 <div class="contenido">
 	<div id="trnegra"></div>
 	<img src="../images/Menu.png" class="menu">
 <fieldset>
 	<label class="Nm">Cambiar nick</label>
 	<input type="text" name="Varibale_nick" class="inNm" placeholder="Nuevo nombre">
 	</label>
 	<label class="Np">Cambiar contraseña</label>
 	<input type="password" name="Varible_password" class="inPs" placeholder="Nueva contraseña">
 	<label class="Tl">Cambiar teléfono</label>
 	<input type="number" name="Varibale_telefono" class="inTl" placeholder="Teléfono">
 </fieldset>
 <fieldset>
 	<label class="Ne">Cambiar equipo</label>
 	<input type="text" name="Varible_equipo" class="inNe" placeholder="Equipo">
 </fieldset>
 <button type="button" class="Boton">
 	<span>¡Vamos!</span>
</button>
 </div>
 <button type="button" class="Logout">
< <a href="CerrarSesion.php">
      <button type="button" class="Logout">
        <span>Cerrar sesión</span>
      </button>
  </a>

</button>
<script src="abrir.js"></script>
 <script src="http://code.jquery.com/jquery-latest.js"></script>
</body>
</html>
