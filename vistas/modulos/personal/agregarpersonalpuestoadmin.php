<?php

require_once('php/conexion.php');
$conexion = new Conexion;
$con = $conexion->conexion(); 

 ?>

<div class="container">	
<form method="POST" action="php/modelopersonalpuesto.php">
	      
		     	<br><h3>Asignacion de Puesto y Departamento</h3>

				<div class="input-group mb-3">
		          <input type="hidden" class="form-control" placeholder="Titulo" name="idppdd" required="" 
		          value="<?php echo $_SESSION['idagregarpuesto']; ?>">
		        </div>


				<?php 

		     		$consulta = "SELECT * FROM puesto";
					$resultado = $con->query($consulta);
					if(!$resultado) die ("Error al realizar la consulta");
					$renglones = $resultado->num_rows;
					echo '<label for="">Puesto</label>
		         				<div class="input-group mb-3">
		          				<select class="form-control" name="puestopd">';
					for($i = 0; $i<$renglones; $i++){
						$renglon = $resultado->fetch_array(MYSQLI_ASSOC);
								echo '<option value="'.$renglon['id'].'">'.$renglon['nombre'].'</option>';
						}
					echo '		</select>
		        		</div>';



		        	$consulta = "SELECT * FROM departamento";
					$resultado = $con->query($consulta);
					if(!$resultado) die ("Error al realizar la consulta");
					$renglones = $resultado->num_rows;
					echo '<label for="">Departamento</label>
		         				<div class="input-group mb-3">
		          				<select class="form-control" name="departamentopd">';
					for($i = 0; $i<$renglones; $i++){
						$renglon = $resultado->fetch_array(MYSQLI_ASSOC);
								echo '<option value="'.$renglon['id'].'">'.$renglon['nombre'].'</option>';
						}
					echo '		</select>
		        		</div>';



		     	?>
				
	        <input type="submit" class="btn btn-primary" name="asignar" value="Asignar">
	      
	      </form>
	      </div>