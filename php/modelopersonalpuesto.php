<?php
session_start();
require_once('conexion.php');
$conexion = new Conexion;
$con = $conexion->conexion();


//ElIMINACION DE UN PERSONAL
if(isset($_POST['idpuestodepartamento'])){
	$consulta = "DELETE FROM puestodepartamento WHERE id = ".$_POST['idpuestodepartamento'];
	$resultado = $con->query($consulta);
	if(!$resultado){
		echo '<script>alert("No se ha podido eliminar!")</script>';
	}else{
		echo '<script>alert("Se ha eliminado correctamenter!")</script>';
		header("location: ../index.php");
	}
}


//INSERTAR UN PUESTO Y DEPARTAMENTO
if(isset($_POST['idppdd']) && isset($_POST['puestopd']) && isset($_POST['departamentopd']))
	//VERIFICANDO QUE NO SE REPITA EL PUESTO EN EL MISMO DEPARTAMENTO
	$consulta = "select count(*) as cuenta from puestodepartamento where personal =".$_POST['idppdd']." and departamento =".$_POST['departamentopd']." and puesto =".$_POST['puestopd'];
	$resultado = $con->query($consulta);
	$renglon = $resultado->fetch_array(MYSQLI_ASSOC);
	if($renglon['cuenta'] == 0){

			//OBTENIENDO EL NOMBRE DEL PUESTO QUE SE DESEA ASIGNAR
			$consulta = "select nombre from puesto where id =".$_POST['puestopd'];
			$resultado = $con->query($consulta);
			$renglon = $resultado->fetch_array(MYSQLI_ASSOC);
			if(strcmp($renglon['nombre'], "Jefe") == 0){
				$puesto = $renglon['nombre'];
				//SI EL PUESTO ES IGUAL	A JEFE, ASEGURARSE QUE EL DEPARTAMENTO NO TENGA UN JEFE	
				$consulta = "select pd.id,pu.nombre as puesto, d.nombre as departamento, d.id as iddepartamento from puestodepartamento pd join personal p on pd.personal = p.id join departamento d on d.id = pd.departamento join puesto pu on pu.id = pd.puesto having puesto = '".$puesto."' and  iddepartamento =".$_POST['departamentopd'];
				
				$resultado = $con->query($consulta);
				$renglon = $resultado->fetch_array(MYSQLI_ASSOC);
				if(count($renglon) == 0){
						$consulta = "INSERT INTO puestodepartamento VALUES(null,
						'".$_POST['idppdd']."',
						'".$_POST['departamentopd']."',
						'".$_POST['puestopd']."')";

						$resultado = $con->query($consulta);
						if(!$resultado){
							echo '<script>alert("No se ha podido registrar el puesto!")</script>';
						}else{
							echo '<script>alert("Se ha registrado correctamenter el puesto!")</script>';
							$_SESSION['vistapersonalpuesto'] = "ok";
							if(isset($_SESSION['vistapersonalagregarpuesto'])){
								unset($_SESSION['vistapersonalagregarpuesto']);
							}
							header("location: ../index.php");
						}
				}else{
						echo '<script>alert("Ya tiene un jefe este departamento")</script>';
						$_SESSION['vistapersonalpuesto'] = "ok";
							if(isset($_SESSION['vistapersonalagregarpuesto'])){
								unset($_SESSION['vistapersonalagregarpuesto']);
							}
							header("location: ../index.php");
				}
			}else{
				$consulta = "INSERT INTO puestodepartamento VALUES(null,
						'".$_POST['idppdd']."',
						'".$_POST['departamentopd']."',
						'".$_POST['puestopd']."')";

						$resultado = $con->query($consulta);
						if(!$resultado){
							echo '<script>alert("No se ha podido registrar el puesto!")</script>';
						}else{
							echo '<script>alert("Se ha registrado correctamenter el puesto!")</script>';
							$_SESSION['vistapersonalpuesto'] = "ok";
							if(isset($_SESSION['vistapersonalagregarpuesto'])){
								unset($_SESSION['vistapersonalagregarpuesto']);
							}
							header("location: ../index.php");
						}
			}

	}else{
		echo '<script>alert("Ya tiene este puesto en este departamento")</script>';
		$_SESSION['vistapersonalpuesto'] = "ok";
							if(isset($_SESSION['vistapersonalagregarpuesto'])){
								unset($_SESSION['vistapersonalagregarpuesto']);
							}
							header("location: ../index.php");
	}





	
?>