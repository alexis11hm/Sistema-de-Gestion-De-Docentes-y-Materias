<?php
session_start();
require_once('conexion.php');
include 'mensaje.php';
$conexion = new Conexion;
$con = $conexion->conexion();

Mensaje::enlazar();


//INSERCION
if(isset($_POST['nombre']) && isset($_POST['abreviatura'])){

	if(!existe($_POST['nombre'])){

		$consulta = "insert into departamento values(null,'".$_POST['nombre']."','".$_POST['abreviatura']."')";

	$resultado = $con->query($consulta);

	$con->close();
	if(!$resultado){
		Mensaje::mostrarMensaje("Registro Departamento", "¡No se ha podio registrar!","error");
	}else{
		Mensaje::mostrarMensaje("Registro Departamento", "¡Se ha registrado correctamente!","success");
        header( "refresh:1.5; url=../index.php" );
	}

	}else{
		Mensaje::mostrarMensaje("Registro Departamento", "¡Este departamento ya existe!","error");
        header( "refresh:1.5; url=../index.php" );
	}

}


//ElIMINACION
if(isset($_POST['idd']) && estaVacio($_POST['idd'])){

	$consulta = "DELETE FROM departamento WHERE id = ".$_POST['idd'];
	$resultado = $con->query($consulta);
	$con->close();
	if(!$resultado){
		Mensaje::mostrarMensaje("Eliminar Departamento", "¡No se ha podido eliminar!","error");
	}else{
		Mensaje::mostrarMensaje("Eliminar Departamento", "¡Se ha eliminado correctamente!","success");
        header( "refresh:1.5; url=../index.php" );
	}
}else{
        header( "refresh:0; url=../index.php" );
}

//ACTUALIZACION
if(isset($_POST['nombree']) && isset($_POST['abreviaturae']) && isset($_POST['ide'])){

	if(isset($_SESSION['idedit'])){
		unset($_SESSION['idedit']);
	}

	if(!existe($_POST['nombree'])){

		$consulta = "UPDATE departamento SET nombre = '".$_POST['nombree']."',abreviatura = '".$_POST['abreviaturae']."' WHERE id = ".$_POST['ide'];

	$resultado = $con->query($consulta);
	$con->close();
	if(!$resultado){
		Mensaje::mostrarMensaje("Actualizar Departamento", "¡No se ha actualizado!","error");
	}else{
		$_SESSION['contenido'] = "departamentosIndex";
		Mensaje::mostrarMensaje("Actualizar Departamento", "¡Se ha actualizado correctamente!","success");
        header( "refresh:1.5; url=../index.php" );
	}

	}else{
		$_SESSION['contenido'] = "departamentosIndex";
		Mensaje::mostrarMensaje("Actualizar Departamento", "¡Este departamento ya existe!","error");
        header( "refresh:1.5; url=../index.php" );
	}

}

function estaVacio($departamento){
	$conexion = new Conexion;
	$con = $conexion->conexion(); 
	$consulta = "SELECT * FROM puestodepartamento WHERE departamento = ".$departamento;
	$resultado = $con->query($consulta);
	if(!$resultado) die ("Error al realizar la consulta");
	$existencia = $resultado->num_rows;
	if($existencia>0)return false;
	return true;
}

function existe($nombre){
	$conexion = new Conexion;
	$con = $conexion->conexion(); 
	$consulta = "SELECT * FROM departamento WHERE nombre = '".$nombre."'";
	$resultado = $con->query($consulta);
	if(!$resultado) die ("Error al realizar la consulta");
	$existencia = $resultado->num_rows;
	if($existencia>0)return true;
	return false;
}

?>