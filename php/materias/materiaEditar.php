<?php
session_start();

if(isset($_SESSION['contenido'])){
	unset($_SESSION['contenido']);
}

if(isset($_POST['idedit'])){
	$_SESSION['idedit'] = $_POST["idedit"];
}

$_SESSION["contenido"] = "materiaEditar";
header('Location: ../../index.php');

?>