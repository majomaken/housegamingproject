<!DOCTYPE html>
<html>
<head>
	<title>League of legends</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Api.css">
</head>
<body id="lo">
	<div id="cas">
<?php

	/*Mediante el siguiente if se obtiene la informacion basica del nick gracias a la variable isset que permite determinar si una variable esta definida*/
	if (isset($_GET['informacion']) && isset($_GET['Region'])) {
		$informacion= $_GET['informacion'];
		$Region= $_GET['Region'];


		/*Les recuerdo que la api_key tiene una duracion de un día*/
		$url="https://".$Region.".api.riotgames.com/lol/summoner/v3/summoners/by-name/".$informacion."?api_key=RGAPI-dae25e5d-425e-42fc-945b-ff1cde6b8ac2";

		$json= file_get_contents($url);
		/*Con el json decode se decodifica la informacion para poder mostrala de una manera mas organizada*/
		$datos= json_decode($json, true);

		echo "Datos basicos: "."<br>";
		echo "<br>"." ID: ". ($datos["id"])."<br>";
		echo " Nick: ". ($datos["name"])."<br>";
		echo " Nivel: ". ($datos["summonerLevel"])."<br>"."<br>";
	}	
	else{
		echo "El nombre de nick no existe";
	}	
	
	/*A continuacion tomamos el id que obtuvimos en paso anterior para así poder mostrale al usuario sus datos en las liga*/
	$league= $datos["id"];

	if (isset($league)) {

		$link="https://".$Region.".api.riotgames.com/lol/league/v3/positions/by-summoner/".$league."?api_key=RGAPI-dae25e5d-425e-42fc-945b-ff1cde6b8ac2";

		$json2= file_get_contents($link);
		echo "Datos sobre la ranked Solo/Dúo: "."<br>"."<br>";

		/*Como existen tres tipos de ranked se debe especificar cual es la que deceamos, por lo tanto $datos2[0] es para la clasificatoria Solo/Dúo, $datos2[1] es para la clasificatoria flexible 5 vs 5 y $datos2[2] es para la clasificatoria 3 vs 3*/		
		if ($datos2= json_decode($json2, true)) {

			echo " Liga: ". ($datos2[0]["tier"])."<br>";
			if ($datos2[0]["tier"]=="GOLD") {
				echo '<img src="Ligas/3.png" />'."<br>";
			}
			else if ($datos2[0]["tier"]=="SILVER") {
					echo '<img src="Ligas/2.png" />'."<br>";
				}
				else if ($datos2[0]["tier"]=="BRONZE") {
						echo '<img src="Ligas/1.png" />'."<br>";
					}
					else if ($datos2[0]["tier"]=="PLATINUM") {
							echo '<img src="Ligas/4.png" />'."<br>";
						}
						else if ($datos2[0]["tier"]=="DIAMOND") {
								echo '<img src="Ligas/5.png" />'."<br>";
							}
							else if ($datos2[0]["tier"]=="MASTER") {
								echo '<img src="Ligas/6.png" />'."<br>";
								}
								else if ($datos2[0]["tier"]=="CHALLENGER") {
									echo '<img src="Ligas/7.png" />'."<br>";
									}

			echo " Rango: ". ($datos2[0]["rank"])."<br>";
			echo " Victorias: ". ($datos2[0]["wins"])."<br>";
			echo " Derrotas: ". ($datos2[0]["losses"])."<br>";
			echo " Puntos de liga: ". ($datos2[0]["leaguePoints"])."<br>"."<br>";
		} 
		else{
			echo "Aún no se encuentra en una ranked"."<br>"."<br>";
		}

		echo "Datos sobre la ranked Flexible 5 vs 5: "."<br>"."<br>";

		if (isset($datos2[1])) {
			echo " Liga: ". ($datos2[1]["tier"])."<br>";

			if ($datos2[1]["tier"]=="GOLD") {
				echo '<img src="Ligas/3.png" />'."<br>";
			}
			else if ($datos2[1]["tier"]=="SILVER") {
					echo '<img src="Ligas/2.png" />'."<br>";
				}
				else if ($datos2[1]["tier"]=="BRONZE") {
						echo '<img src="Ligas/1.png" />'."<br>";
					}
					else if ($datos2[1]["tier"]=="PLATINUM") {
							echo '<img src="Ligas/4.png" />'."<br>";
						}
						else if ($datos2[1]["tier"]=="DIAMOND") {
								echo '<img src="Ligas/5.png" />'."<br>";
							}
							else if ($datos2[1]["tier"]=="MASTER") {
								echo '<img src="Ligas/6.png" />'."<br>";
								}
								else if ($datos2[1]["tier"]=="CHALLENGER") {
									echo '<img src="Ligas/7.png" />'."<br>";
									}
									
			echo " Rango: ". ($datos2[1]["rank"])."<br>";
			echo " Victorias: ". ($datos2[1]["wins"])."<br>";
			echo " Derrotas: ". ($datos2[1]["losses"])."<br>";
			echo " Puntos de liga: ". ($datos2[1]["leaguePoints"])."<br>"."<br>";	
		}
		else{
			echo "Aún no se encuentra en una ranked"."<br>"."<br>";
		}

		echo "Datos sobre la ranked 3 vs 3: "."<br>"."<br>";

		if (isset($datos2[2])) {
			echo " Liga: ". ($datos2[2]["tier"])."<br>";

			if ($datos2[2]["tier"]=="GOLD") {
				echo '<img src="Ligas/3.png" />'."<br>";
			}
			else if ($datos2[2]["tier"]=="SILVER") {
					echo '<img src="Ligas/2.png" />'."<br>";
				}
				else if ($datos2[2]["tier"]=="BRONZE") {
						echo '<img src="Ligas/1.png" />'."<br>";
					}
					else if ($datos2[2]["tier"]=="PLATINUM") {
							echo '<img src="Ligas/4.png" />'."<br>";
						}
						else if ($datos2[2]["tier"]=="DIAMOND") {
								echo '<img src="Ligas/5.png" />'."<br>";
							}
							else if ($datos2[2]["tier"]=="MASTER") {
								echo '<img src="Ligas/6.png" />'."<br>";
								}
								else if ($datos2[2]["tier"]=="CHALLENGER") {
									echo '<img src="Ligas/7.png" />'."<br>";
									}

			echo " Rango: ". ($datos2[2]["rank"])."<br>";
			echo " Victorias: ". ($datos2[2]["wins"])."<br>";
			echo " Derrotas: ". ($datos2[2]["losses"])."<br>";
			echo " Puntos de liga: ". ($datos2[2]["leaguePoints"])."<br>";	
		}
		else{
			echo "Aún no se encuentra en una ranked"."<br>";
		}
	}
?>	
	</div>
</body>
</html>