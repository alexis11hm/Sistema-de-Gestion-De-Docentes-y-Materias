<?php

require_once('php/conexion.php');
$conexion = new Conexion;
$con = $conexion->conexion();
$consulta = "select * from docentemateria where id = ".$_SESSION['idedit'];
$resultado = $con->query($consulta);
if(!$resultado) die ("Error al realizar la consulta");

$docentemateria = $resultado->fetch_array(MYSQLI_ASSOC);

?>

<div class="container">	
<form method="POST" action="php/modeloAsignada.php">
	      
		     	<br><h4>Editar Materia Asignada</h4><br>	

		      	<div class="input-group mb-3">
		          <input type="hidden" class="form-control" placeholder="" name="ide" required="" 
		          value="<?php echo $docentemateria["id"]; ?>">
		        </div>

		        <div class="form-group mb-3">
			<label for="materia">Materia</label>
		      	<?php

		require_once('php/conexion.php');
	    $conexion = new Conexion;
		$con = $conexion->conexion();
		$consulta = "SELECT * FROM materia";
		$resultado = $con->query($consulta);
		if(!$resultado) die ("Error al realizar la consulta");

		$renglones = $resultado->num_rows;

		echo '<select class="form-control" name="materiae" id="materiae">';

		for($i = 0; $i<$renglones; $i++){
			$renglon = $resultado->fetch_array(MYSQLI_ASSOC);
			if($docentemateria['materia'] == $renglon['id']){
				echo '<option value="'.$renglon['id'].'" selected="">'.$renglon['nombre'].'</option>';
			}else{
				echo '<option value="'.$renglon['id'].'">'.$renglon['nombre'].'</option>';
			}

	    }
	    echo '</select>';

	    ?>
		</div>


		<div class="form-group mb-3">
			<label for="materia">Docente</label>
		      	<?php

		require_once('php/conexion.php');
	    $conexion = new Conexion;
		$con = $conexion->conexion();
		$consulta = "select puestodepartamento.id as id, personal.nombre as nombre, paterno,materno,abreviatura from puestodepartamento join departamento on  puestodepartamento.departamento = departamento.id join personal on puestodepartamento.personal = personal.id where puestodepartamento.puesto = 1";
		$resultado = $con->query($consulta);
		if(!$resultado) die ("Error al realizar la consulta");

		$renglones = $resultado->num_rows;

		echo '<select class="form-control" name="docentee" id="docentee">';

		for($i = 0; $i<$renglones; $i++){
			$renglon = $resultado->fetch_array(MYSQLI_ASSOC);
			if($docentemateria['puestodepartamento'] == $renglon['id']){
				echo '<option value="'.$renglon['id'].'" selected="">'.$renglon['nombre']." ".$renglon['paterno']." ".$renglon['materno']." - ".$renglon['abreviatura'].'</option>';
			}else{
				echo '<option value="'.$renglon['id'].'">'.$renglon['nombre']." ".$renglon['paterno']." ".$renglon['materno']." - ".$renglon['abreviatura'].'</option>';	
			}
	    }
	    echo '</select>';

	    ?>
		</div>

		<div class="form-group mb-3">
			<label for="">Año</label>
			<input type="number" required="" readonly="" name="anioe" class="form-control" value="<?php echo $docentemateria['anio']; ?>">
		</div>

		<div class="form-group mb-3">
			<label for="">Semestre</label>
			<select class="form-control" name="semestree" id="semestre" required="">
				<?php 
					if ($docentemateria['semestre'] == 1) {
						echo '<option value="1" selected="">Enero - Junio</option>
				<option value="2">Agosto - Diciembre</option>';
					}else{
						echo '<option value="1">Enero - Junio</option>
				<option value="2" selected="">Agosto - Diciembre</option>';
					}
				?>
			</select>
		</div>

		<div class="form-group mb-3">
			<label for="">Grupo</label>
			<input type="text" required="" class="form-control" name="grupoe" value="<?php echo $docentemateria['grupo']; ?>">
		</div>
		      
	        <input type="submit" class="btn btn-primary" name="registrar" value="Guardar Datos">
	      
	</form>
</div>