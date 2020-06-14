<?php

session_start();

if(isset($_SESSION["contenido"])){
	unset($_SESSION["contenido"]);
}

$_SESSION["contenido"] = "vistavisualizarcalificacion";

if(isset($_POST['ruta'])){
	$_SESSION['rutavisualizarcalificacion'] = $_POST['ruta'];
}

header('Location: ../../index.php');

?>