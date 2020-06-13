<?php

session_start();

if(isset($_SESSION["vistavisualizarcalificacion"])){
	unset($_SESSION["vistavisualizarcalificacion"]);
}


$_SESSION["vistatabla"] = "ok";

header('Location: ../../index.php');

?>