<?php

session_start();

if(isset($_SESSION["contenido"])){
	unset($_SESSION["contenido"]);
}

$_SESSION["contenido"] = "vistaeditarcalificacion";

if(isset($_POST['idedit'])){
	$_SESSION['idedit'] = $_POST['idedit'];
}

header('Location: ../../index.php');

?>