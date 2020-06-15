<?php
	include 'mensaje.php';
	session_start();
	session_destroy();

	Mensaje::enlazar();


	Mensaje::mostrarMensajeProgresivo("Cerrando Sesión", "Cerrando sesión en", 3000);
	header( "refresh:3; url=../index.php" );

 ?>