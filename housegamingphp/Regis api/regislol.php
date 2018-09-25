<?php
/*
	require 'conexion.php';
	session_start();

$juego=$_POST['juego'];

		if (isset($juego)) {
			$registro= mysqli_query($Conectar,"INSERT INTO game(GameName) values('$juego')");

			if ($registro) {
				echo "<script> alert('Se han registrado sus datos con exito');</script>";
			}
			else{
				echo "<script> alert('No se han registrado sus datos con exito');</script>";
			}
		}
*/
?>

<!DOCTYPE html>
<html>
<head>
	<title>Api</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/Api.css">
</head>
<body id="lol">
	<form class="" action="registrolol.php" method="get">
		<div id="kas">
			<h1>Seleccion su región</h1>
			<select id="l" name="Region">
				<option>Seleccione...</option>
				<option>RU</option>
				<option>KR</option>
				<option>BR1</option>
				<option>OC1</option>
				<option>JP1</option>
				<option>NA1</option>
				<option>EUN1</option>
				<option>EUW1</option>
				<option>TR1</option>
				<option>LA1</option>
				<option>LA2</option>
			</select>
			<h1 for="informacion">Digite su nick<br><h2>(Sin espacios)</h2></h1>
			<input id="l" type="text" name="informacion" placeholder="Digite su nick" required="required">
			<button id="bl" type="submit" name="button">Enviar</button>
		</div>
	</form>
</body>
</html>
