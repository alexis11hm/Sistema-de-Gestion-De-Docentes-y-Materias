<?php

session_start();

if(isset($_SESSION["contenido"])){
	unset($_SESSION["contenido"]);
}


$_SESSION["contenido"] = "vistatabla";

header('Location: ../../index.php');

?>