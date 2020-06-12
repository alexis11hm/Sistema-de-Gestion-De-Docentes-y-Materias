<?php

session_start();

if(isset($_SESSION['vistapersonal'])){
	unset($_SESSION['vistapersonal']);
}

if(isset($_SESSION['vistapersonalpuesto'])){
	unset($_SESSION['vistapersonalpuesto']);
}

if(isset($_SESSION['vistapersonalagregarpuesto'])){
	unset($_SESSION['vistapersonalagregarpuesto']);
}

if(isset($_SESSION['vistapersonaledit'])){
	unset($_SESSION['vistapersonaledit']);
}

if(isset($_POST['idver'])){
	$_SESSION['idver'] = $_POST["idver"];
}

$_SESSION["vistapersonalver"] = "ok";

header('Location: ../index.php');

?>