<?php
session_start();

if(isset($_SESSION['contenido'])){
	unset($_SESSION['contenido']);
}

if(isset($_POST['idver'])){
	$_SESSION['idver'] = $_POST["idver"];
}

$_SESSION["contenido"] = "puestoVisualizar";
header('Location: ../../index.php');

?>