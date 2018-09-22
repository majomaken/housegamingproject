<!DOCTYPE html>
<html>
<head>
	<title>World of warcraft</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/Api.css">
</head>
<body id="warcraft">

	<div id="war">
		<?php
			error_reporting(0);
			$key="kwv7q2hqhrcm4nycbzmzu73w4fqcau86";

			/*Mediante el siguiente if se obtiene la informacion basica del nick gracias a la variable isset que permite determinar si una variable esta definida*/

			if (isset($_GET['informacion']) && isset($_GET['Reino'])) {
				$informacion= $_GET['informacion'];
				$reino= $_GET['Reino'];

				/*Les recuerdo que la api_key tiene una duracion de un día*/
				$url="https://eu.api.battle.net/wow/character/".$reino."/".$informacion."?locale=en_GB&apikey=".$key;

				if($json= file_get_contents($url)){
					/*Con el json decode se decodifica la informacion para poder mostrala de una manera mas organizada*/
					$datos= json_decode($json, true);

					echo "Datos de ".$datos["name"].":"."<br>"."<br>";
					echo " Nick: ". ($datos["name"])."<br>";
					echo " Reino: ". ($datos["realm"])."<br>";
					echo " Nivel: ". ($datos["level"])."<br>";
					echo " Total de honor: ". ($datos["totalHonorableKills"])."<br>";
					echo " Grupo de batalla: ". ($datos["battlegroup"])."<br>";
					echo " Total de puntos: ". ($datos["achievementPoints"])."<br>";
				}
				else{
					echo "El nick o el id no existen";
					exit();
				}
			}
		?>
	</div>
</body>
</html>