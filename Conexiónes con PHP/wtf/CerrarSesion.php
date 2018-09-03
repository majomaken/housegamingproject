<?php
	session_start();
	//libera variables de la sesion
	session_unset();
	//Destruye informacion registrada
	session_destroy();

	header("Location:index.html");
?>