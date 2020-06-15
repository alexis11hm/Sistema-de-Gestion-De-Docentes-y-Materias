<?php
session_start();
require 'conexion.php';
$conexion = new Conexion;
$con = $conexion->conexion();



//INSERCION
if(isset($_POST['docente']) && isset($_POST['materia']) && isset($_POST['anio']) && isset($_POST['semestre']) && isset($_POST['grupo'])){

	if($_POST['anio'] == date("Y")){


		$consulta = "insert into docentemateria values(null,'".$_POST['materia']."','".$_POST['docente']."','".$_POST['anio']."','".$_POST['semestre']."','".$_POST['grupo']."')";

	$resultado = $con->query($consulta);

	$con->close();
	if(!$resultado){
		echo '<script>alert("¡No se ha podido registrar!")</script>';
	}else{
		echo '<script>alert("Se ha registrado correctamente!")</script>';
		header("location: ../index.php");
	}



	}else{
		echo "No se pueden registrar materias anteriores";
		header("location: ../index.php");
	}

}else{
	echo "No creada";
}


//ElIMINACION
if(isset($_POST['idd']) && estaVacio($_POST['idd'])){

	$consulta = "DELETE FROM docentemateria WHERE id = ".$_POST['idd'];
	$resultado = $con->query($consulta);
	$con->close();
	if(!$resultado){
		echo '<script>alert("No se ha podido eliminar!")</script>';
	}else{
		echo '<script>alert("Se ha eliminado correctamenter!")</script>';
		header("location: ../index.php");
	}
}else{
	echo '<script>alert("No se puede eliminar o se perderán calificaciones")</script>';
	header("location: ../index.php");
}

//ACTUALIZACION
if(isset($_POST['docentee']) && isset($_POST['materiae']) && isset($_POST['anioe']) && isset($_POST['semestree']) && isset($_POST['grupoe']) && isset($_POST['ide'])){

	if(isset($_SESSION['idedit'])){
		unset($_SESSION['idedit']);
	}

	if($_POST['anioe'] == date("Y")){

		$consulta = "UPDATE docentemateria SET materia = ".$_POST['materiae'].",puestodepartamento = ".$_POST['docentee'].", anio = ".$_POST['anioe'].", semestre = ".$_POST['semestree']." , grupo = '".$_POST['grupoe']."' WHERE id = ".$_POST['ide'];

	$resultado = $con->query($consulta);
	$con->close();
	if(!$resultado){
		echo '<script>alert("No se ha Actualizado")</script>';
	}else{
		echo '<script>alert("Actualizado")</script>';
		$_SESSION['contenido'] = "asignadasIndex";
		header("location: ../index.php");
	}

	}else{
		echo "No se pueden registrar materias anteriores";
		$_SESSION['contenido'] = "asignadasIndex";
		header("location: ../index.php");
	}

}

function estaVacio($materia){
	$conexion = new Conexion;
	$con = $conexion->conexion(); 
	$consulta = "SELECT * FROM calificacion WHERE docentemateria = ".$materia;
	$resultado = $con->query($consulta);
	if(!$resultado) die ("Error al realizar la consulta");
	$existencia = $resultado->num_rows;
	if($existencia>0)return false;
	return true;
}

?>