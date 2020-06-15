<div class="container">

	  <!-- Button trigger modal -->
	<button type="button" class=" col-12 btn btn-success" data-toggle="modal" data-target="#modalAsignarMateria">
	   <label for="" class="fas fa-plus"> </label>
	</button>

	<!-- Modal -->
	<div class="modal fade" id="modalAsignarMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Materia</h5>
	      </div>

	      <form method="POST" action="php/modeloAsignada.php" enctype="multipart/form-data">
	      <div class="modal-body">
	        <div class="card">
		    <div class="card-body register-card-body">
		      <p class="login-box-msg"><b>Asignar Materia</b></p>


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

		echo '<select class="form-control" name="materia" id="materia">';

		for($i = 0; $i<$renglones; $i++){
			$renglon = $resultado->fetch_array(MYSQLI_ASSOC);
			echo '<option value="'.$renglon['id'].'">'.$renglon['nombre'].'</option>';

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

		echo '<select class="form-control" name="docente" id="docente">';

		for($i = 0; $i<$renglones; $i++){
			$renglon = $resultado->fetch_array(MYSQLI_ASSOC);
			echo '<option value="'.$renglon['id'].'">'.$renglon['nombre']." ".$renglon['paterno']." ".$renglon['materno']." - ".$renglon['abreviatura'].'</option>';

	    }
	    echo '</select>';

	    ?>
		</div>


		<div class="form-group mb-3">
			<label for="">Año</label>
			<input type="number" required="" name="anio" readonly="" class="form-control" value='<?php echo date("Y"); ?>'>
		</div>

		<div class="form-group mb-3">
			<label for="">Semestre</label>
			<select class="form-control" name="semestre" id="semestre" required="">
				<option value="1">Enero - Junio</option>
				<option value="2">Agosto - Diciembre</option>
			</select>
		</div>

		<div class="form-group mb-3">
			<label for="">Grupo</label>
			<input type="text" class="form-control" name="grupo" id="grupo" required="">
		</div>
		      
		    </div>
		    <!-- /.form-box -->
		  </div><!-- /.card -->

	      </div>
	      <div class="modal-footer">
	      	<input type="reset" class="btn btn-warning" name="limpiar" value="Limpiar">
	        <input type="submit" class="btn btn-primary" name="registrar" value="Registrar">
	        <input type="button" class="btn btn-danger" data-dismiss="modal" name="cancelar" value="Cancelar">
	      </div>
	      
	      </form>
	    </div>
	  </div>
	</div>
 
</div>