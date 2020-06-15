<?php
session_start();
require_once('conexion.php');
include 'mensaje.php';
$conexion = new Conexion;
$con = $conexion->conexion();

Mensaje::enlazar();




//INSERCION DE UN PERSONAL
if(isset($_POST['tituloa']) && isset($_POST['nombrea']) && isset($_POST['paternoa']) && 
	isset($_POST['sexoa']) && isset($_POST['rfca']) && isset($_POST['curpa']) &&
	isset($_FILES['fotoa']) && isset($_POST['passworda']) && isset($_POST['correoa']) &&
	isset($_POST['tipoa']) && isset($_POST['maternoa'])){

	if(!existeRFC($_POST['rfca'])){

		if(!existeCURP($_POST['curpa'])){

			if(!existeCorreo($_POST['correoa'])){

		
		///////////////////////

				if(strcmp($_POST['tipoa'], "Administrador") == 0){
		$tipo = 2;
	}else{
		$tipo = 1;
	}

	$foto = $_FILES['fotoa']['name'];
	$ruta = $_FILES['fotoa']['tmp_name'];
	$destino = "fotos/".$foto;
	copy($ruta, $destino);


	$consulta = "INSERT INTO personal VALUES(null,
		'".$_POST['tituloa']."',
		'".$_POST['nombrea']."',
		'".$_POST['paternoa']."',
		'".$_POST['maternoa']."',
		'".$_POST['sexoa']."',
		'".$_POST['rfca']."',
		'".$_POST['curpa']."',
		'".$destino."',
		'".$_POST['correoa']."',
		'".$_POST['passworda']."',
		".$tipo.")";

	$resultado = $con->query($consulta);
	$con->close();
	if(!$resultado){
		Mensaje::mostrarMensaje("Registro Personal", "¡No se ha podido registrar!","error");
	}else{
		Mensaje::mostrarMensaje("Registro Personal", "¡Se ha registrado correctamente!","success");
        header( "refresh:1.5; url=../index.php" );
	}

				//////////////////



	}else{
		Mensaje::mostrarMensaje("Registro Personal", "¡Este correo ya existe!","error");
        header( "refresh:1.5; url=../index.php" );
	}
		
	}else{
		Mensaje::mostrarMensaje("Registro Personal", "¡Esta CURP ya existe!","error");
        header( "refresh:1.5; url=../index.php" );
	}

	}else{
		Mensaje::mostrarMensaje("Registro Personal", "¡Esta RFC ya existe!","error");
        header( "refresh:1.5; url=../index.php" );
	}

}


//ElIMINACION DE UN PERSONAL
if(isset($_POST['idd'])){

	$consulta = "DELETE FROM puestodepartamento WHERE personal = ".$_POST['idd'];
	$resultado = $con->query($consulta);
	if(!$resultado){
		echo '<script>alert("No se ha podido eliminar!")</script>';
	}else{

		$consulta = "SELECT * FROM personal WHERE id = ".$_POST['idd'];
		$resultado = $con->query($consulta);
		if(!$resultado){
			echo '<script>alert("No se ha podido eliminar!")</script>';
		}else{
			$renglon = $resultado->fetch_array(MYSQLI_ASSOC);
			$foto = $renglon['foto'];
			unlink($foto);
			$consulta = "DELETE FROM personal WHERE id = ".$_POST['idd'];
			$resultado = $con->query($consulta);
			$con->close();
			if(!$resultado){
				echo '<script>alert("No se ha podido eliminar!")</script>';
			}else{
				Mensaje::mostrarMensaje("Eliminar Personal", "¡Personal Eliminado Crorrectamente!","success");
        		header( "refresh:1.5; url=../index.php" );
			}
		}

		

	}
}

//ACTUALIZACION DE UN PERSONAL
if(isset($_POST['tituloe']) && isset($_POST['nombree']) && isset($_POST['paternoe']) && 
	isset($_POST['sexoe']) && isset($_POST['rfce']) && isset($_POST['curpe']) &&
	isset($_FILES['fotoe']) && isset($_POST['passworde']) && isset($_POST['correoe']) &&
	isset($_POST['tipoe']) && isset($_POST['maternoe']) && isset($_POST['ide'])){

	if(isset($_SESSION['idedit'])){
		unset($_SESSION['idedit']);
	}

	if(!existeRFCEditar($_POST['rfce'],$_POST['ide'])){

		if(!existeCURPEditar($_POST['curpe'],$_POST['ide'])){

			if(!existeCorreoEditar($_POST['correoe'],$_POST['ide'])){

		
				//////////////////////////

				if(strcmp($_POST['tipoe'], "Administrador") == 0){
		$tipo = 2;
	}else{
		$tipo = 1;
	}

	$foto = $_FILES['fotoe']['name'];
	$ruta = $_FILES['fotoe']['tmp_name'];
	$destino = "fotos/".$foto;
	if($foto != ""){
		copy($ruta, $destino);
	}

	$consulta = "UPDATE personal SET
				titulo = '".$_POST['tituloe']."',
				nombre = '".$_POST['nombree']."',
				paterno = '".$_POST['paternoe']."',
				materno = '".$_POST['maternoe']."',
				sexo = '".$_POST['sexoe']."',
				rfc = '".$_POST['rfce']."',
				curp = '".$_POST['curpe']."',";
				if($foto != ""){
					$consulta .= "foto = '".$destino."',";
				}
				$consulta .= "correo = '".$_POST['correoe']."',
				password = '".$_POST['passworde']."',
				tipo = ".$tipo." WHERE id = ".$_POST['ide'];

	$resultado = $con->query($consulta);
	$con->close();
	if(!$resultado){
		Mensaje::mostrarMensaje("Actualizar Personal", "¡Personal No Actualizado!","error");
        header( "refresh:1.5; url=../index.php" );
	}else{
		$_SESSION['contenido'] = "vistapersonal";
		Mensaje::mostrarMensaje("Actualizar Personal", "¡Personal Actualizado Correctamente!","success");
        header( "refresh:1.5; url=../index.php" );
	}

				///////////////////////////

		
	}else{
		$_SESSION['contenido'] = "vistapersonal";
		Mensaje::mostrarMensaje("Actualizar Personal", "¡Este Correo ya Existe!","error");
        header( "refresh:1.5; url=../index.php" );
	}
		
	}else{
		$_SESSION['contenido'] = "vistapersonal";
		Mensaje::mostrarMensaje("Actualizar Personal", "¡Esta CURP ya Existe!","error");
        header( "refresh:1.5; url=../index.php" );
	}

	}else{
		$_SESSION['contenido'] = "vistapersonal";
		Mensaje::mostrarMensaje("Actualizar Personal", "¡Este RFC ya Existe!","error");
        header( "refresh:1.5; url=../index.php" );
	}

}

function existeRFC($rfc){
	$conexion = new Conexion;
	$con = $conexion->conexion(); 
	$consulta = "SELECT * FROM personal WHERE rfc = '".$rfc."'";
	$resultado = $con->query($consulta);
	if(!$resultado) die ("Error al realizar la consulta");
	$existencia = $resultado->num_rows;
	if($existencia>0)return true;
	return false;
}

function existeCURP($curp){
	$conexion = new Conexion;
	$con = $conexion->conexion(); 
	$consulta = "SELECT * FROM personal WHERE curp = '".$curp."'";
	$resultado = $con->query($consulta);
	if(!$resultado) die ("Error al realizar la consulta");
	$existencia = $resultado->num_rows;
	if($existencia>0)return true;
	return false;
}

function existeCorreo($correo){
	$conexion = new Conexion;
	$con = $conexion->conexion(); 
	$consulta = "SELECT * FROM personal WHERE correo = '".$correo."'";
	$resultado = $con->query($consulta);
	if(!$resultado) die ("Error al realizar la consulta");
	$existencia = $resultado->num_rows;
	echo "<script>alert('".$consulta."')</script>";
	if($existencia>0)return true;
	return false;
}


/////////////////
function existeRFCEditar($rfc,$id){
	$conexion = new Conexion;
	$con = $conexion->conexion(); 
	$consulta = "SELECT * FROM personal WHERE rfc = '".$rfc."' and id != ".$id;
	$resultado = $con->query($consulta);
	if(!$resultado) die ("Error al realizar la consulta");
	$existencia = $resultado->num_rows;
	if($existencia>0)return true;
	return false;
}

function existeCURPEditar($curp,$id){
	$conexion = new Conexion;
	$con = $conexion->conexion(); 
	$consulta = "SELECT * FROM personal WHERE curp = '".$curp."' and id != ".$id;
	$resultado = $con->query($consulta);
	if(!$resultado) die ("Error al realizar la consulta");
	$existencia = $resultado->num_rows;
	if($existencia>0)return true;
	return false;
}

function existeCorreoEditar($correo,$id){
	$conexion = new Conexion;
	$con = $conexion->conexion(); 
	$consulta = "SELECT * FROM personal WHERE correo = '".$correo."' and id != ".$id;
	$resultado = $con->query($consulta);
	if(!$resultado) die ("Error al realizar la consulta");
	$existencia = $resultado->num_rows;
	if($existencia>0)return true;
	return false;
}

?>
