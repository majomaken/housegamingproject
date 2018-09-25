<div class="left-panel">
<ul>
<div class="imgd">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>"  method="POST">

  <?php
    error_reporting(0);
    $id=$_SESSION['id'];
    $sqll=mysqli_query($Conectar,"SELECT AvatarSrc From Avatar INNER JOIN user ON user.UsAvatar=Avatar.AvatarId WHERE UsHGTAG ='$id'");
    $icono=mysqli_fetch_array($sqll);
    echo '<img class="imgd" src="'.$icono['AvatarSrc'].'" id="modal">';
    $nick=mysqli_query($Conectar,"SELECT UsNickname From user where UsHGTAG='$id'");
    $nickname=mysqli_fetch_array($nick);
  ?>
</div>
<label class="Nombre"><h2><?php echo "Welcome ". $nickname['UsNickname'];?></label></h2>
<li><a href="perfil.php">Perfil</li></a>
    <li><a href="esports.php">Noticias</li></a>
    <li><a href="Equip.php">Equipo</li></a>
<<<<<<< HEAD
    <li><a href="invitations.php">Invitaciones</li></a>
    <li><a href="Configuraciones.php">Configuraciones</li></a>
    <li style="background:rgba(0, 173, 239, 0.4)"><a href="CerrarSesion.php">Cerrar sesión</li></a>
=======

    <li><a href="invitations.php">Invitaciones
      <?php if ($inviUs['InviReceive'] == $id && $inviUs['InviStatus'] == 'PENDING'): ?>
         <i class="fas fa-exclamation"></i>
       <?php else: ?>
       <?php endif; ?></li></a>
    <li><a href="Configuraciones.php">Configuración</li></a>
    <li><a href="Regis api/regislol.php">Registro de Juegos</li></a>
    <li><a href="Regis api/api.php">Juegos</li></a>
>>>>>>> a61fc4d639748891dad64e5077b5b7e9c8278d76
  </ul>
</div>
<div id="lamascara" class="mascara">
	 <div class="modall">
	 	<h3>Escoge tu Nuevo Icono</h3><br>
		 <span class="cerrar">&times;</span>
			<?php
				$sql = mysqli_query($Conectar,"SELECT AvatarSrc,AvatarId From Avatar WHERE AvatarSrc LIKE 'A%'");

				while($avatar=mysqli_fetch_array($sql)){

					echo '<label><input type="radio" name="radio"  class="radioo" value="'.$avatar['AvatarId'].'"><img src="'.$avatar['AvatarSrc'].'" id="modal" class="imag"></label>';
				}
				if (isset($_POST['icono'])) {
				 $radio = $_POST['radio'];
				$update = mysqli_query($Conectar,"UPDATE user SET UsAvatar = '$radio' where UsHGTAG = '".$_SESSION['id']."'");

				}
				if ($update) {
					header("Location: ".$_SERVER['PHP_SELF']."");
				}
			?>
		 <p><input type="submit" name="icono"  value="Cambiar Avatar"/></p>
	</form>
  </div>
  </div>
  <script src="assets/js/iconos.js"></script>
