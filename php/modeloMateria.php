<?php
session_start();
require 'conexion.php';
$conexion = new Conexion;
$con = $conexion->conexion();

//INSERCION
if(isset($_POST['nombre'])){

	if(!existe($_POST['nombre'])){

		$consulta = "insert into materia values(null,'".$_POST['nombre']."')";

	$resultado = $con->query($consulta);

	$con->close();
	if(!$resultado){
		echo '<script>alert("¡No se ha podido registrar!")</script>';
	}else{
		echo '<script>alert("Se ha registrado correctamente!")</script>';
		header("location: ../index.php");
	}

	}else{
		echo "<script>alert('repetido')</script>";
		header("location: ../index.php");
	}

}else{
	echo "No creada";
}


//ElIMINACION
if(isset($_POST['idd']) && estaVacio($_POST['idd'])){

	$consulta = "DELETE FROM materia WHERE id = ".$_POST['idd'];
	$resultado = $con->query($consulta);
	$con->close();
	if(!$resultado){
		echo '<script>alert("No se ha podido eliminar!")</script>';
	}else{
		echo '<script>alert("Se ha eliminado correctamente!")</script>';
		header("location: ../index.php");
	}
}else{
	echo '<script>alert("¡Este departamento no se puede eliminar!")</script>';
	header("location: ../index.php");
}


//ACTUALIZACION
if(isset($_POST['nombree']) && isset($_POST['ide'])){

	if(isset($_SESSION['idedit'])){
		unset($_SESSION['idedit']);
	}

	if(!existe($_POST['nombree'])){

		$consulta = "UPDATE materia SET nombre = '".$_POST['nombree']."' WHERE id = ".$_POST['ide'];

	$resultado = $con->query($consulta);
	$con->close();
	if(!$resultado){
		echo '<script>alert("No se ha actualizado")</script>';
	}else{
		echo '<script>alert("Actualizado")</script>';
		$_SESSION['contenido'] = "materiasIndex";
		header("location: ../index.php");
	}

	}else{
		echo '<script>alert("repetida")</script>';
		$_SESSION['contenido'] = "materiasIndex";
		header("location: ../index.php");
	}

}

function estaVacio($materia){
	$conexion = new Conexion;
	$con = $conexion->conexion(); 
	$consulta = "SELECT * FROM docentemateria WHERE materia = ".$materia;
	$resultado = $con->query($consulta);
	if(!$resultado) die ("Error al realizar la consulta");
	$existencia = $resultado->num_rows;
	if($existencia>0)return false;
	return true;
}

function existe($nombre){
	$conexion = new Conexion;
	$con = $conexion->conexion(); 
	$consulta = "SELECT * FROM materia WHERE nombre = '".$nombre."'";
	$resultado = $con->query($consulta);
	if(!$resultado) die ("Error al realizar la consulta");
	$existencia = $resultado->num_rows;
	if($existencia>0)return true;
	return false;
}

?>