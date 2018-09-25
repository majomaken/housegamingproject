<?php
	include ('conexion.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Seleccion</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/Seleccion.css">
</head>
<body>
	<script type="text/javascript">
		var lol, nick1, nick2, wow, id;
		lol = confirm("¿Tienes una cuenta en League of Leguends?");

		if (lol == true) {
			nick1= prompt("¿Cual es tu nick en League of Leguends?");
			region= prompt("¿En que región tienes registrada tu cuenta?")
		}

		wow=confirm("¿Tienes una cuenta en World Of Warcraft?");
		if (wow==true) {
			nick2= prompt("¿Cual es tu nick en World Of Warcraft?");
			id= prompt("¿Cual es tu id en World Of Warcraft?")
		}
		alert(nick1+" "+nick2);
	</script>
</body>
</html>
<?php
	mysqli_query($Conectar,"INSERT INTO  ");
?>