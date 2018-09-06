<?php
	require 'conexion.php';
	session_start();

	if (isset($_POST['Enviar'])) {
	$Name=$_REQUEST["Name"];
	$Foto=$_FILES["Avatar"]["name"];
	$Ruta=$_FILES["Avatar"]["tmp_name"];
	$Destino="Avatar/".$Foto;
	copy($Ruta,$Destino);

	$Insert="INSERT INTO avatar (AvatarName,AvatarSrc) values ('$Name','$Foto')";
	$Datos=mysqli_query($Conectar,$Insert);
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Subir Imagen</title>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST" enctype="multipart/form-data">
	<input type="text" name="Name" placeholder="Name del la imagen"/>
	<input type="File" name="Avatar" value="Examinar..."/>
	<input type="submit" name="Enviar" value="Enviar"/>
	</form>
	<?php
	//Muestra todas los Avatars guardados
	$Select=mysqli_query($Conectar,"SELECT AvatarSrc,AvatarName From avatar");
	while($Res=mysqli_fetch_array($Select)){
		echo $Res["AvatarName"]."<br/>";
		echo '<img src="'.$Res['AvatarSrc'].'" width="40" heigth="40"><br/>';
	}


?>
</body>
</html>
