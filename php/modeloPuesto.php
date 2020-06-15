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

		$consulta = "insert into puesto values(null,'".$_POST['nombre']."')";

		$resultado = $con->query($consulta);

		$con->close();
		if(!$resultado){
			Mensaje::mostrarMensaje("Registro Puesto", "¡No se ha podido registrar!","error");
	        header( "refresh:1.5; url=../index.php" );
		}else{
			Mensaje::mostrarMensaje("Registro Puesto", "¡Se ha registrado correctamente!","success");
	        header( "refresh:1.5; url=../index.php" );
		}

	}else{
		Mensaje::mostrarMensaje("Registro Puesto", "¡Ya existe este puesto!","error");
        header( "refresh:1.5; url=../index.php" );
	}

}


//ElIMINACION
if(isset($_POST['idd']) && estaVacio($_POST['idd']) && $_POST['idd'] > 2){

	$consulta = "DELETE FROM puesto WHERE id = ".$_POST['idd'];
	$resultado = $con->query($consulta);
	$con->close();
	if(!$resultado){
		Mensaje::mostrarMensaje("Eliminar Puesto", "¡No se ha podido Eliminar!","error");
	}else{
		Mensaje::mostrarMensaje("Eliminar Puesto", "¡Se ha eliminado correctamente!","success");
        header( "refresh:1.5; url=../index.php" );
	}
}else{
	header("location: ../index.php");
}


//ACTUALIZACION
if(isset($_POST['nombree']) && isset($_POST['ide']) && $_POST['ide'] > 2){

	if(isset($_SESSION['idedit'])){
		unset($_SESSION['idedit']);
	}

	if(!existe($_POST['nombree'])){

		$consulta = "UPDATE puesto SET nombre = '".$_POST['nombree']."' WHERE id = ".$_POST['ide'];

		$resultado = $con->query($consulta);
		$con->close();
		if(!$resultado){
			Mensaje::mostrarMensaje("Actualizar Puesto", "¡No se ha podido Actualizar!","error");
	        	
		}else{
			$_SESSION['contenido'] = "puestosIndex";
			Mensaje::mostrarMensaje("Actualizar Puesto", "¡Se ha actualizado correctamente!","success");
	        header( "refresh:1.5; url=../index.php" );
		}

	}else{
		$_SESSION['contenido'] = "puestosIndex";
		Mensaje::mostrarMensaje("Actualizar Puesto", "¡Este puesto ya existe!","error");
        header( "refresh:1.5; url=../index.php" );
	}

}

function estaVacio($puesto){
	$conexion = new Conexion;
	$con = $conexion->conexion(); 
	$consulta = "SELECT * FROM puestodepartamento WHERE puesto = ".$puesto;
	$resultado = $con->query($consulta);
	if(!$resultado) die ("Error al realizar la consulta");
	$existencia = $resultado->num_rows;
	if($existencia>0)return false;
	return true;
}

function existe($nombre){
	$conexion = new Conexion;
	$con = $conexion->conexion(); 
	$consulta = "SELECT * FROM puesto WHERE nombre = '".$nombre."'";
	$resultado = $con->query($consulta);
	if(!$resultado) die ("Error al realizar la consulta");
	$existencia = $resultado->num_rows;
	if($existencia>0)return true;
	return false;
}

?>