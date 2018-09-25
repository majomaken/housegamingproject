<!DOCTYPE html>
<html>
<head>
	<title>League of legends</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../assets/css/Api.css">
</head>
<body>

	<div id="cas">
		<?php
			require 'conexion.php';
			session_start();
			error_reporting();

			if (!isset($_SESSION['userr'])) {
			    echo '<script> window.location="index.php"; </script>';
			}

				$id=$_SESSION['id'];
			    $nick=mysqli_query($Conectar,"SELECT UsNickname From user where UsHGTAG='$id'");
			    $nickname=mysqli_fetch_array($nick);

			    $name= mysqli_query($Conectar, "SELECT GameNick from GameReg where UsHGTAG=['id'] and gameid=[idjuego]");

			    $Reg= mysqli_query($Conectar, "SELECT GameNick from GameReg where UsHGTAG=['id'] and gameid=[select GameId from game where server =['LA1'] and GameName=['league of legends']]");

			$key="RGAPI-f7d0af1a-5aea-4a94-a35c-08f5d8d3cc69";

			/*Mediante el siguiente if se obtiene la informacion basica del nick gracias a la variable isset que permite determinar si una variable esta definida*/

			$nick= mysqli_query($Conectar,"SELECT UsNickname FROM user WHERE  UsHGTAG='$id' ");
			$nick2=mysqli_fetch_array($nick);

			$regi= mysqli_query($Conectar,"SELECT UsNickname FROM user WHERE  UsHGTAG='$id' ");
			$regi2=mysqli_fetch_array($regi);

				$informacion= $nickname['UsNickname'];
				$Region= "LA1";

				/*Les recuerdo que la api_key tiene una duracion de un día*/
				$url="https://".$Region.".api.riotgames.com/lol/summoner/v3/summoners/by-name/".$informacion."?api_key=".$key;

				if($json= file_get_contents($url)){
					/*Con el json decode se decodifica la informacion para poder mostrala de una manera mas organizada*/
					$datos= json_decode($json, true);

					echo "Datos basicos: "."<br>";
					echo "<br>"." ID: ". ($datos["id"])."<br>";
					echo " Nick: ". ($datos["name"])."<br>";
					echo " Nivel: ". ($datos["summonerLevel"])."<br>"."<br>";
				}
				else{
					echo "El nick no existe en la ragión que escogio";
					exit();
				}
			
		?>
	</div>

	<div class="container-league">
	<div class="container-leaguePoints">
		<?php

			/*A continuacion tomamos el id que obtuvimos en paso anterior para así poder mostrale al usuario sus datos en las liga*/

			$league= $datos["id"];

			if (isset($league)) {

				$link="https://".$Region.".api.riotgames.com/lol/league/v3/positions/by-summoner/".$league."?api_key=".$key;

				$json2= file_get_contents($link);

				/*Como existen tres tipos de ranked se debe especificar cual es la que deceamos, por lo tanto $datos2[0] es para la clasificatoria Solo/Dúo, $datos2[1] es para la clasificatoria flexible 5 vs 5 y $datos2[2] es para la clasificatoria 3 vs 3*/

				if ($datos2= json_decode($json2, true)) {

					if (isset($datos2[0]["queueType"])) {
						if ($datos2[0]["queueType"]=="RANKED_SOLO_5x5") {
							echo "Datos sobre RANKED Solo/Dúo: "."<br>"."<br>";
						}
						else{
							echo "Datos sobre RANKED Flexible 5 vs 5: "."<br>"."<br>";
						}
					}

					echo " Liga: ". ($datos2[0]["tier"])."<br>";

					switch ($datos2[0]["tier"]) {
						case 'BRONZE':
								echo '<img src="../assets/images/images_api/ligas/1.png" />'."<br>";
							break;
						case 'SILVER':
								echo '<img src="../assets/images/images_api/ligas/2.png" />'."<br>";
							break;
						case 'GOLD':
								echo '<img src="../assets/images/images_api/ligas/3.png" />'."<br>";
							break;
						case 'PLATINUM':
								echo '<img src="../assets/images/images_api/ligas/4.png" />'."<br>";
							break;
						case 'DIAMOND':
								echo '<img src="../assets/images/images_api/ligas/5.png" />'."<br>";
							break;
						case 'MASTER':
								echo '<img src="../assets/images/images_api/ligas/6.png" />'."<br>";
							break;
						case 'CHALLENGER':
								echo '<img src="../assets/images/images_api/ligas/7.png" />'."<br>";
							break;
					}
			
					echo " Rango: ". ($datos2[0]["rank"])."<br>";
					echo " Victorias: ". ($datos2[0]["wins"])."<br>";
					echo " Derrotas: ". ($datos2[0]["losses"])."<br>";
					echo " Puntos de liga: ". ($datos2[0]["leaguePoints"])."<br>"."<br>";
				}
				else{
					echo "Aún no se encuentra en una ranked"."<br>"."<br>";
					echo '<img src="../assets/images/images_api/ligas/0.png" />'."<br>";
				}
		?>
	</div>

	<div class="container-leaguePoints">
		<?php

			if (isset($datos2[1]["queueType"])) {
				if ($datos2[0]["queueType"]=="RANKED_SOLO_5x5") {
					echo "Datos sobre RANKED Flexible 5 vs 5: "."<br>"."<br>";
				}
				else{
					echo "Datos sobre RANKED Solo/Dúo: "."<br>"."<br>";
				}
			}

			if (isset($datos2[1])) {
				echo " Liga: ". ($datos2[1]["tier"])."<br>";

				switch ($datos2[1]["tier"]) {
					case 'BRONZE':
							echo '<img src="../assets/images/images_api/ligas/1.png" />'."<br>";
						break;
					case 'SILVER':
							echo '<img src="../assets/images/images_api/ligas/2.png" />'."<br>";
						break;
					case 'GOLD':
							echo '<img src="../assets/images/images_api/ligas/3.png" />'."<br>";
						break;
					case 'PLATINUM':
							echo '<img src="../assets/images/images_api/ligas/4.png" />'."<br>";
						break;
					case 'DIAMOND':
							echo '<img src="../assets/images/images_api/ligas/5.png" />'."<br>";
						break;
					case 'MASTER':
							echo '<img src="../assets/images/images_api/ligas/6.png" />'."<br>";
						break;
					case 'CHALLENGER':
							echo '<img src="../assets/images/images_api/ligas/7.png" />'."<br>";
						break;
				}

				echo " Rango: ". ($datos2[1]["rank"])."<br>";
				echo " Victorias: ". ($datos2[1]["wins"])."<br>";
				echo " Derrotas: ". ($datos2[1]["losses"])."<br>";
				echo " Puntos de liga: ". ($datos2[1]["leaguePoints"])."<br>"."<br>";
			}
			else{
				echo "Aún no se encuentra en una ranked"."<br>"."<br>";
				echo '<img src="../assets/images/images_api/ligas/0.png" />'."<br>";
			}
		?>
	</div>

	<div class="container-leaguePoints">
		<?php
			echo "Datos sobre RANKED 3 vs 3: "."<br>"."<br>";

			if (isset($datos2[2])) {
				echo " Liga: ". ($datos2[2]["tier"])."<br>";

				switch ($datos2[2]["tier"]) {
					case 'BRONZE':
							echo '<img src="../assets/images/images_api/ligas/1.png" />'."<br>";
						break;
					case 'SILVER':
							echo '<img src="../assets/images/images_api/ligas/2.png" />'."<br>";
						break;
					case 'GOLD':
							echo '<img src="../assets/images/images_api/ligas/3.png" />'."<br>";
						break;
					case 'PLATINUM':
							echo '<img src="../assets/images/images_api/ligas/4.png" />'."<br>";
						break;
					case 'DIAMOND':
							echo '<img src="../assets/images/images_api/ligas/5.png" />'."<br>";
						break;
					case 'MASTER':
							echo '<img src="../assets/images/images_api/ligas/6.png" />'."<br>";
						break;
					case 'CHALLENGER':
							echo '<img src="../assets/images/images_api/ligas/7.png" />'."<br>";
						break;
				}

				echo " Rango: ". ($datos2[2]["rank"])."<br>";
				echo " Victorias: ". ($datos2[2]["wins"])."<br>";
				echo " Derrotas: ". ($datos2[2]["losses"])."<br>";
				echo " Puntos de liga: ". ($datos2[2]["leaguePoints"])."<br>";
			}
			else{
				echo "Aún no se encuentra en una ranked"."<br>";
				echo '<img src="../assets/images/images_api/ligas/0.png" />'."<br>";
			}
			}
		?>
	</div>
</div>
</body>
</html>
