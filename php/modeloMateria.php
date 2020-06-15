<?php
session_start();
require_once('conexion.php');
include 'mensaje.php';
$conexion = new Conexion;
$con = $conexion->conexion();

Mensaje::enlazar();

//INSERCION
if(isset($_POST['nombre'])){

	if(!existe($_POST['nombre'])){

		$consulta = "insert into materia values(null,'".$_POST['nombre']."')";

		$resultado = $con->query($consulta);

		$con->close();
		if(!$resultado){
			Mensaje::mostrarMensaje("Registro Materia", "¡No se ha podido registrar!","error");
	        
		}else{
			Mensaje::mostrarMensaje("Registro Materia", "¡Se ha registrado correctamente!","success");
	        header( "refresh:1.5; url=../index.php" );
		}

	}else{
		Mensaje::mostrarMensaje("Registro Materia", "¡Esta materia ya existe!","error");
	        header( "refresh:1.5; url=../index.php" );
	    }
}


//ElIMINACION
if(isset($_POST['idd']) && estaVacio($_POST['idd'])){

	$consulta = "DELETE FROM materia WHERE id = ".$_POST['idd'];
	$resultado = $con->query($consulta);
	$con->close();
	if(!$resultado){
		Mensaje::mostrarMensaje("Eliminar Materia", "¡No se ha podido Eliminar!","error");
	}else{
		Mensaje::mostrarMensaje("Eliminar Materia", "¡Se ha eliminado correctamente!","success");
	        header( "refresh:1.5; url=../index.php" );
	}
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
			Mensaje::mostrarMensaje("Actualizar Materia", "¡No se ha podido actualizar!","error");
		        header( "refresh:1.5; url=../index.php" );
		}else{
			$_SESSION['contenido'] = "materiasIndex";
			Mensaje::mostrarMensaje("Actualizar Materia", "¡Se ha actulizado correctamente!","success");
		        header( "refresh:1.5; url=../index.php" );
		}

	}else{
		$_SESSION['contenido'] = "materiasIndex";
		Mensaje::mostrarMensaje("Actualizar Materia", "¡Ya existe esta materia!","error");
	        header( "refresh:1.5; url=../index.php" );
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