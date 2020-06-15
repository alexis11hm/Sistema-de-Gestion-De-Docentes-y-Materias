<?php
	session_start();
	if(isset($_SESSION['contenido'])){
		unset($_SESSION['contenido']);
	}

	$_SESSION["contenido"] = "materiasIndex";
	header('Location: ../../index.php');
?>