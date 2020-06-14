<?php
session_start();
require_once('conexion.php');
$conexion = new Conexion;
$con = $conexion->conexion();


//INSERCION DE UN PERSONAL
if(isset($_POST['tituloa']) && isset($_POST['nombrea']) && isset($_POST['paternoa']) && 
	isset($_POST['sexoa']) && isset($_POST['rfca']) && isset($_POST['curpa']) &&
	isset($_FILES['fotoa']) && isset($_POST['passworda']) && isset($_POST['correoa']) &&
	isset($_POST['tipoa']) && isset($_POST['maternoa'])){

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
		echo '<script>alert("No se ha podido registrar!")</script>';
	}else{
		echo '<script>alert("Se ha registrado correctamenter!")</script>';
		header("location: ../index.php");
	}

}else{
	echo "No creada";
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
				echo '<script>alert("Se ha eliminado correctamenter!")</script>';
				header("location: ../index.php");
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

	if(strcmp($_POST['tipoe'], "Administrador") == 0){
		$tipo = 2;
	}else{
		$tipo = 1;
	}

	$foto = $_FILES['fotoe']['name'];
	$ruta = $_FILES['fotoe']['tmp_name'];
	$destino = "fotos/".$foto;
	copy($ruta, $destino);

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
		echo '<script>alert("No se ha actualizar el personal!")</script>';
	}else{
		echo '<script>alert("Se ha actualizado correctamenter!")</script>';
		$_SESSION['contenido'] = "vistapersonal";
		header("location: ../index.php");

	}

}


?>