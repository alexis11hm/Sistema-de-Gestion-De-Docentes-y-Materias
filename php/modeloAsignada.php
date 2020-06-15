<?php
session_start();
require_once('conexion.php');
include 'mensaje.php';
$conexion = new Conexion;
$con = $conexion->conexion();

Mensaje::enlazar();



//INSERCION
if(isset($_POST['docente']) && isset($_POST['materia']) && isset($_POST['anio']) && isset($_POST['semestre']) && isset($_POST['grupo'])){

	if($_POST['anio'] == date("Y")){


		$consulta = "insert into docentemateria values(null,'".$_POST['materia']."','".$_POST['docente']."','".$_POST['anio']."','".$_POST['semestre']."','".$_POST['grupo']."')";

		$resultado = $con->query($consulta);

		$con->close();
		if(!$resultado){
			Mensaje::mostrarMensaje("Asignacion de materia", "¡No se ha podido asignar la materia!","error");
		}else{
			Mensaje::mostrarMensaje("Asignacion de materia", "¡Se ha asignado la materia correctamente!","success");
		    header( "refresh:1.5; url=../index.php" );
		}

	}else{
		Mensaje::mostrarMensaje("Asignacion de materia", "¡No se pueden asignar materias anteriores!","warning");
	    header( "refresh:1.5; url=../index.php" );
	}

}


//ElIMINACION
if(isset($_POST['idd']) && estaVacio($_POST['idd'])){

	$consulta = "DELETE FROM docentemateria WHERE id = ".$_POST['idd'];
	$resultado = $con->query($consulta);
	$con->close();
	if(!$resultado){
		Mensaje::mostrarMensaje("Eliminar Asignacion de materia", "¡No se ha podido eliminar!","error");
	}else{
		Mensaje::mostrarMensaje("Eliminar Asignacion de materia", "¡Se ha eliminado correctamente!","success");
	    header( "refresh:1.5; url=../index.php" );
	}
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
			Mensaje::mostrarMensaje("Actualizar Asignacion de materia", "¡No se ha podido actualizar!","error");
		}else{
			$_SESSION['contenido'] = "asignadasIndex";
			Mensaje::mostrarMensaje("Actualizar Asignacion de materia", "¡Se ha actualizado correctamente!","success");
		    header( "refresh:1.5; url=../index.php" );
		}

	}else{
		$_SESSION['contenido'] = "asignadasIndex";
		Mensaje::mostrarMensaje("Actualizar Asignacion de materia", "¡No se puden actualizar materias anteriores!","error");
	    header( "refresh:1.5; url=../index.php" );
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