<?php

session_start();

if(isset($_SESSION['vistapersonal'])){
	unset($_SESSION['vistapersonal']);
}

if(isset($_SESSION['vistapersonalver'])){
	unset($_SESSION['vistapersonalver']);
}

if(isset($_SESSION['vistapersonaledit'])){
	unset($_SESSION['vistapersonaledit']);
}

if(isset($_SESSION['vistapersonalpuesto'])){
	unset($_SESSION['vistapersonalpuesto']);
}


if(isset($_POST['idagregarpuesto'])){
	$_SESSION['idagregarpuesto'] = $_POST["idagregarpuesto"];
}

$_SESSION["vistapersonalagregarpuesto"] = "ok";

header('Location: ../index.php');

?>