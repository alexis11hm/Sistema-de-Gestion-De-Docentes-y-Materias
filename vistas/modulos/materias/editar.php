<?php

require_once('php/conexion.php');
$conexion = new Conexion;
$con = $conexion->conexion(); 
$consulta = "SELECT * FROM materia where id = ".$_SESSION['idedit'];
$resultado = $con->query($consulta);
if(!$resultado) die ("Error al realizar la consulta");

$renglon = $resultado->fetch_array(MYSQLI_ASSOC);

?>

<div class="container">	
<form method="POST" action="php/modeloMateria.php">
	      
		     	<br><h4>Editar Materia</h4><br>	

		      	<div class="input-group mb-3">
		          <input type="hidden" class="form-control" placeholder="" name="ide" required="" 
		          value="<?php echo $renglon["id"]; ?>">
		        </div>

		        <label for="">Nombre</label>
		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="Nombre" name="nombree" required="" 
		          value="<?php echo $renglon["nombre"]; ?>">
		        </div>
		      
	        <input type="submit" class="btn btn-primary" name="registrar" value="Guardar Datos">
	      
	</form>
</div>