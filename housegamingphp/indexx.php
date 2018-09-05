<?php
    require 'conexion.php';
    session_start();
    error_reporting(0);

    if (!isset($_SESSION['userr'])) {
   echo '<script> window.location="index.php"; </script>';
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="assets/css/master.css">
        <title>House Gaming</title>
        <link rel="icon" type="image/jpg" href="images/iconhg.png">
    </head>
    <body >
        
         <header>
            <nav class="nav">
                <ul class="menumain">
                <a href=""><img src="images/logohg.png" alt="" class="logo"></a>
                <li>
                    <a href="">Equipos</a>
                    <ul class="submenu">
                        <li><a href="">Jugadores</a></li>
                        <li><a href="">Juegos</a></li>
                        <li><a href="">Top</a></li>
                        </li>
                    </ul>
                <li><a href="">Locales</a></li>
                <li><a href="Perfil/esports.php">Competitivo</a></li>
                <li><a href="Nosotros/Nosotros.html">Abouts us</a></li>
                <li class="account">
                    <a href=""><?php echo $_SESSION['userr'];echo '<img src="'.$_SESSION['Imagen'].'" width="40" heigth="40"><br/>';?></a>
                    <ul class="submenu-account">
                        <li>
                            <a href="CerrarSesion.php"><button class="login-hg" onclick="window.location.href='#';">Cerrar Sesion</button></a>
                        </li>
                    </ul>
            </nav>
        </header>
        <section>
            <article>
                <div id="div1" class="slider">
                    <ul>
                        <li><img src="images/slider/slide1.jpg" alt=""></li>
                        <li><img src="images/slider/slide2.jpg" alt=""></li>
                        <li><img src="images/slider/slide3.jpg" alt=""></li>
                        <li><img src="images/slider/slide4.jpg" alt=""></li>
                    </ul>
                </div>
            </article>
        </section>
				<section>
					<h2 id="palabra">Juegos en los que puedes crear tus equipos</h2>
	        <div id="contentDiv">
	            <div><a href=""><img src="images/lolr.jpg"  alt=""></a></div>
	            <div><a href=""><img src="images/paladins.jpg"  alt=""></a></div>
	            <div><a href=""><img src="images/fornite.jpg"  alt=""></a></div>
	            <div><a href=""><img src="images/dota2.jpg"  alt=""></a></div>
	            <div><a href=""><img src="images/fifa18.jpg" alt=""></a></div>
	        </div>

				</section>

        <footer>
            <div id=div3 class="container-body">
                <div class="colum1">
                    <h1>Mas informacion de la compañia</h1>
                    <br>
                    <p>Nuestra compañia quiere crear un ambiente social dentro
                        y fuera de nuestro establecimiento formando una comunidad gamer.
                        Formar al jugador de la manera mejor posible en los video
                        juegos más competitivos a nivel mundial, con una guía
                        estructurada y un coach que acompañe a los jugadores.
                    </p>
                </div>
                <div class="Colum2">
                    <h1>Redes sociales</h1>
                    <div class="row">
                        <img src="C:\Users\Home\Downloads\Footer-HTML5-CSS3-master\icon\facebook.png">
                        <label>Siguenos en Facebook</label>
                    </div>
                    <div class="row">
                        <img src="C:\Users\Home\Downloads\Footer-HTML5-CSS3-master\icon\google-plus.png">
                        <label>Siguenos en Google plus</label>
                    </div>
                    <div class="row">
                        <img src="C:\Users\Home\Downloads\Footer-HTML5-CSS3-master\icon\twitter.png">
                        <label>Siguenos en Twitter</label>
                    </div>
                </div>
                <div class="Colum2">
                    <h1>Informacion de contacto</h1>
                    <div class="row2">
                        <img src="C:\Users\Home\Downloads\Footer-HTML5-CSS3-master\icon\house.png">
                        <label>Estamos ubicados en Mosquera, Cundinamarca</label>
                    </div>
                    <div class="row2">
                        <img src="C:\Users\Home\Downloads\Footer-HTML5-CSS3-master\icon\smartphone.png">
                        <label>+57 3208765489</label>
                    </div>
                    <div class="row2">
                        <img src="C:\Users\Home\Downloads\Footer-HTML5-CSS3-master\icon\contact.png">
                        <label>housegamingcol@gmail.com</label>
                    </div>
                </div>
            </div>
            <div class="container-footer">
                <div class="Copyright">
                    © 2018 Todos los derechos reservados | HouseGaming
                </div>
                <div class="Information">
                    <a href="">Información compañia</a> | <a href="">Privacidad y politica </a>|<a href=""> Terminos y condiciones</a>
                </div>
            </div>
        </footer>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="Particulas/particles.js"></script>
    <script src="Particulas/particulas.js"></script>
    </body>
</html>
