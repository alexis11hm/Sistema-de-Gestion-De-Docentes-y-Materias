<?php
session_start();

if(isset($_SESSION['contenido'])){
	unset($_SESSION['contenido']);
}

if(isset($_POST['idpuesto'])){
	$_SESSION['idpuesto'] = $_POST["idpuesto"];
}

$_SESSION["contenido"] = "vistapersonalpuesto";
header('Location: ../index.php');

?>