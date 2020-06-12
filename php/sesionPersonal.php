<?php

session_start();

if(isset($_SESSION['vistapersonalver'])){
	unset($_SESSION['vistapersonalver']);
}

if(isset($_SESSION['vistapersonaledit'])){
	unset($_SESSION['vistapersonaledit']);
}

if(isset($_SESSION['vistapersonalpuesto'])){
	unset($_SESSION['vistapersonalpuesto']);
}

if(isset($_SESSION['vistapersonalagregarpuesto'])){
	unset($_SESSION['vistapersonalagregarpuesto']);
}

if(isset($_SESSION['idver'])){
    unset($_SESSION['idver']);
}

$_SESSION["vistapersonal"] = "ok";

header('Location: ../index.php');

?>