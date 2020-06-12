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

if(isset($_SESSION['vistapersonalpuesto'])){
	unset($_SESSION['vistapersonalpuesto']);
}


if(isset($_POST['idedit'])){
	$_SESSION['idedit'] = $_POST["idedit"];
}

$_SESSION["vistapersonaledit"] = "ok";

header('Location: ../index.php');

?>