<?php

session_start();

if(isset($_SESSION['vistapersonal'])){
	unset($_SESSION['vistapersonal']);
}

if(isset($_SESSION['vistapersonalver'])){
	unset($_SESSION['vistapersonalver']);
}

if(isset($_SESSION['vistapersonalagregarpuesto'])){
	unset($_SESSION['vistapersonalagregarpuesto']);
}

if(isset($_SESSION['vistapersonaledit'])){
	unset($_SESSION['vistapersonaledit']);
}

if(isset($_POST['idpuesto'])){
	$_SESSION['idpuesto'] = $_POST["idpuesto"];
}

$_SESSION["vistapersonalpuesto"] = "ok";

header('Location: ../index.php');

?>