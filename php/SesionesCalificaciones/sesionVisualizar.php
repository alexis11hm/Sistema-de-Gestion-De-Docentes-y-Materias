<?php

session_start();

if(isset($_SESSION["vistatabla"])){
	unset($_SESSION["vistatabla"]);
}

$_SESSION["vistavisualizarcalificacion"] = "ok";

if(isset($_POST['ruta'])){
	$_SESSION['rutavisualizarcalificacion'] = $_POST['ruta'];
}

header('Location: ../../index.php');

?>