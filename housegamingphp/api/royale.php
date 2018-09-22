<!DOCTYPE html>
<html>
<head>
	<title>Clash royale</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/Api.css">
</head>
<body id="clash">

	<div id="war">
		<?php
			error_reporting(0);
			//$key="RGAPI-342c2faf-bb44-4d3b-b007-7f5faf8afc7e";

			/*Mediante el siguiente if se obtiene la informacion basica del nick gracias a la variable isset que permite determinar si una variable esta definida*/

			if (isset($_GET['informacion'])) {
				$informacion= $_GET['informacion'];

				$url="https://api.clashroyale.com/v1/players/%23".$informacion;

				if($json= file_get_contents($url)){
					/*Con el json decode se decodifica la informacion para poder mostrala de una manera mas organizada*/
					$datos= json_decode($json, true);

					echo "Bienvendio ".$datos["name"]."<br>"."<br>";
					echo "<br>"." ID: ". ($datos["id"])."<br>";
					echo " Nivel: ". ($datos["expLevel"])."<br>";
					echo " Victorias: ". ($datos["wins"])."<br>";
					echo " Derrotas: ". ($datos["losses"])."<br>";
					echo " rol: ". ($datos["role"])."<br>"."<br>";
					echo " Clan: ". ($datos["clan"]["name"])."<br>";
					echo " Arena: ". ($datos["arena"]["name"])."<br>"."<br>";
				}
				else{
					echo "Problemas con el servidor";
					
				}
			}
		?>
	</div>
	<h1 for="informacion">Enlace a la página oficial</h1>
	<input type="submit" id="cp" value="Redireccionar" onclick="location.href='https://royaleapi.com/player/<?php echo $informacion; ?>'">
</body>
</html>
