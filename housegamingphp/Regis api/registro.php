<!DOCTYPE html>
<html>
<head>
	<title>Api</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/Api.css">
</head>
<body id="lol">
	<form class="" action="" method="post">
		<div id="kas">
			<h1>Seleccion un juego</h1>
			<select id="l" name="juego" onchange="location= this.value">
				<option value="">Seleccione...</option>
				<option value="regislol.php">League of legends</option>
				<option value="star.php">Starcraft 2</option>
			</select>
			<button id="bl" type="submit" name="button">Enviar</button>
		</div>
	</form>
</body>
</html>