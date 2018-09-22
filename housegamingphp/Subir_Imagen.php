<?php
	require 'conexion.php';

	if (isset($_POST['Enviar'])) {
	$carpeta = $_POST['Select'];
	$name = $_REQUEST["Name"];
	$foto = $_FILES["Avatar"]["name"];
	$ruta = $_FILES["Avatar"]["tmp_name"];

	if ($carpeta == 'ind'){
		$destino = "Avatar/".$foto;
	}else{
		$destino = "teamslogos/".$foto;
	}

	copy($ruta,$destino);
	$insert="INSERT INTO Avatar (AvatarName,AvatarSrc) values ('$name','$destino')";
	$datos=mysqli_query($Conectar,$insert);
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Subir Imagen</title>

</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
	<select name="Select">
		<option name="Individual" value="ind">Icono Individual</option>
		<option name="Team">Icono Team</option>
	</select>
	<input type="text" name="Name" placeholder="Name del la imagen"/>
	<input type="File" name="Avatar" accept="image/jpeg , image/png" />
	<p><input type="submit" name="Enviar" value="Enviar"/></p>
	<?php
		//Muestra todas los Avatars guardados
		$Select=mysqli_query($Conectar,"SELECT AvatarSrc From Avatar");
		while($Res=mysqli_fetch_array($Select)){
			echo $Res['AvatarSrc'];
			echo '<img src="'.$Res['AvatarSrc'].'" width="40" heigth="40"><br/>';
		}
	?>
	</form>
</body>
</html>
