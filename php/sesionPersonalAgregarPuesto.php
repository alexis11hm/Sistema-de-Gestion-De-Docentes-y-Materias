<?php
session_start();

if(isset($_SESSION['contenido'])){
	unset($_SESSION['contenido']);
}

if(isset($_POST['idagregarpuesto'])){
	$_SESSION['idagregarpuesto'] = $_POST["idagregarpuesto"];
}

$_SESSION["contenido"] = "vistapersonalagregarpuesto";
header('Location: ../index.php');

?>