<?php
session_start();
require_once('conexion.php');
$conexion = new Conexion;
$con = $conexion->conexion();


if(isset($_POST['docentemateriaa']) && isset($_FILES['documentoa']) && isset($_POST['unidada'])){

	$doc = $_FILES['documentoa']['name'];
	$ruta = $_FILES['documentoa']['tmp_name'];
	$destino = "archivos/".$doc;
	
	//copy($ruta, $destino);
	move_uploaded_file($ruta, $destino);

	$consulta = "select * from calificacion where documento = '".$destino."' and docentemateria = ".$_POST['docentemateriaa']." and unidad =".$_POST['unidada'];
	$resultado = $con->query($consulta);
	if(!$resultado){
		$consulta = "INSERT INTO calificacion VALUES(null,
		'".$_POST['unidada']."',
		'".$destino."',
		'".$_POST['docentemateriaa']."',curdate())";

		$resultado = $con->query($consulta);
		$con->close();
		if(!$resultado){
			echo '<script>alert("No se ha podido registrar!")</script>';
		}else{
			echo '<script>alert("Se ha registrado correctamenter!")</script>';
			header("location: ../index.php");
		}
	}else{
		echo '<script>alert("Ya ha registrado calificacion con estos datos!")</script>';
		header("location: ../index.php");
	}
}


if(isset($_POST['ideliminarcalificacion'])){	
		$consulta = "SELECT * FROM calificacion WHERE id =".$_POST['ideliminarcalificacion'];
		$resultado = $con->query($consulta);
		
		if(!$resultado){
			echo '<script>alert("No se ha podido eliminar!")</script>';
		}else{
			$renglon = $resultado->fetch_array(MYSQLI_ASSOC);
			$archivo = $renglon['documento'];
			unlink($archivo);

			$consulta = "DELETE FROM calificacion WHERE id = ".$_POST['ideliminarcalificacion'];
			$resultado = $con->query($consulta);
			$con->close();
			if(!$resultado){
				echo '<script>alert("No se ha podido eliminar!")</script>';
			}else{
				echo '<script>alert("Se ha eliminado correctamente!")</script>';
					header("location: ../index.php");
			}
			
		}



}