<?php
session_start();
require_once('conexion.php');
require_once 'mensaje.php';
$conexion = new Conexion;
$con = $conexion->conexion();

Mensaje::enlazar();



//AGREGAR CALIFICACION
if(isset($_POST['docentemateriaa']) && isset($_FILES['documentoa']) && isset($_POST['unidada'])){

	$doc = $_FILES['documentoa']['name'];
	$ruta = $_FILES['documentoa']['tmp_name'];
	//AGREGAR NUMERO RANDOM AL COMIENZO DEL ARCHIVO PARA DIFERENCIARLO
	$num = rand(11111111, 99999999);
	$destino = "archivos/".$num.$doc;
	
	//copy($ruta, $destino);
	

	$consulta = "select * from calificacion where documento = '".$destino."' and docentemateria = ".$_POST['docentemateriaa']." and unidad =".$_POST['unidada'];
	$resultado = $con->query($consulta);
	if($resultado){
		if(null == null){
			$consulta = "INSERT INTO calificacion VALUES(null,
			'".$_POST['unidada']."',
			'".$destino."',
			'".$_POST['docentemateriaa']."',curdate())";

			$resultado = $con->query($consulta);
			$con->close();
			if(!$resultado){
				Mensaje::mostrarMensaje("Registro de calificaciones", "¡No se ha podido registrar!","success");
			}else{
				move_uploaded_file($ruta, $destino);
				Mensaje::mostrarMensaje("Registro de calificaciones", "¡Se han registrado las calificaciones correctamente!","success");
		    	header( "refresh:1.5; url=../index.php" );
			}
		}else{
			Mensaje::mostrarMensaje("Registro de calificaciones", "¡Ya existe un registro igual!","error");
		    header( "refresh:1.5; url=../index.php" );
		}
	}else{
		Mensaje::mostrarMensaje("Registro de calificaciones", "","error");
		header( "refresh:1.5; url=../index.php" );
	}
}

//ELIMINAR CALIFICACION
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
				Mensaje::mostrarMensaje("Eliminacion de calificaciones", "¡No se ha podido eliminar!","error");
		    	header( "refresh:1.5; url=../index.php" );
			}else{
				Mensaje::mostrarMensaje("Eliminacion de calificaciones", "¡Se ha eliminado correctamente!","success");
		    	header( "refresh:1.5; url=../index.php" );
			}
			
		}
}

//EDITAR CALIFICACION
if(isset($_POST['docentemateriae']) && isset($_FILES['documentoe']) && isset($_POST['unidade'])){

	$doc = $_FILES['documentoe']['name'];
	$ruta = $_FILES['documentoe']['tmp_name'];
	$num = rand(11111111, 99999999);
	$destino = "archivos/".$num.$doc;
	
	//copy($ruta, $destino);
	move_uploaded_file($ruta, $destino);

	$consulta = "select * from calificacion where id = ".$_SESSION['idedit'];
	$resultado = $con->query($consulta);
	$renglon = $resultado->fetch_array(MYSQLI_ASSOC);

	$consulta = "UPDATE calificacion SET
				unidad = ".$_POST['unidade'].",
				docentemateria = ".$_POST['docentemateriae'];
				if($doc != ""){
					if($destino == $renglon['documento'] ){

					}else{
						$consulta .= ", documento = '".$destino."'";
						unlink($renglon['documento']);
					}
				}
				$consulta.= " where id =".$_SESSION['idedit'];;

	$resultado = $con->query($consulta);
	$con->close();
	if(!$resultado){
		Mensaje::mostrarMensaje("Actualizacion de calificaciones", "¡No se ha podido actualizar!","error");
		header( "refresh:1.5; url=../index.php" );
	}else{
		$_SESSION['contenido'] = "vistatabla";
		Mensaje::mostrarMensaje("Actualizacion de calificaciones", "¡Se ha actualizado correctamente!","success");
		header( "refresh:1.5; url=../index.php" );

	}
}