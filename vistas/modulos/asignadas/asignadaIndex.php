<div class="container">	

	<div class="col-md-2 float-right" style="margin-top: 10px">
		<?php

		require_once('php/conexion.php');

		include 'agregar.php';

		?>
	</div>
	<h4 style="margin-top: 10px">Lista de Materias Asignadas</h4>

	<table class="table table-hover" style="margin-top: 30px">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Docente</th>
	      <th scope="col">Materia</th>
	      <th scope="col">Departamento</th>
	      <th scope="col">Año</th>
	      <th scope="col">Semestre</th>
	      <th scope="col">Editar</th>
	      <th scope="col">Eliminar</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php

	    $conexion = new Conexion;
		$con = $conexion->conexion(); 
		$consulta = "SELECT docentemateria.id as id,personal.nombre as nombre,paterno,materno, materia.nombre as materia,departamento.nombre as departamento, anio,semestre FROM docentemateria join materia on docentemateria.materia = materia.id join puestodepartamento on docentemateria.puestodepartamento = puestodepartamento.id join personal on puestodepartamento.personal = personal.id join departamento on puestodepartamento.departamento = departamento.id";
		$resultado = $con->query($consulta);
		if(!$resultado) die ("Error al realizar la consulta");

		$renglones = $resultado->num_rows;
		for($i = 0; $i<$renglones; $i++){
			$renglon = $resultado->fetch_array(MYSQLI_ASSOC);

	    echo '<tr>
			      <th scope="row">'.$renglon["id"].'</th>
			      <td>'.$renglon["nombre"]." ".$renglon["paterno"]." ".$renglon["materno"].'</td>
			      <td>'.$renglon["materia"].'</td>
			      <td>'.$renglon["departamento"].'</td>
			      <td>'.$renglon["anio"].'</td>';
			      if($renglon['semestre'] == 1){
			      	echo '<td>Enero - Junio</td>';
			      }else if($renglon['semestre'] == 2){
			      	echo '<td>Agosto - Diciembre</td>';
			      }else{
			      	echo '<td>No asignado</td>';
			      }
			      echo '<td>
					<form method="POST" action="php/asignadas/asignadaEditar.php">
						<input type="hidden" value="'.$renglon['id'].'" name="idedit" />
						<button type="submit" class="btn btn-warning"><i class="fas fa-user-edit"></i></button>
					</form>
			      </td>
			      <td>
					<form method="POST" action="php/modeloAsignada.php">
						<input type="hidden" value="'.$renglon['id'].'" name="idd" />
						<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
					</form>
			      </td>
	    	</tr>';
	    }

	    ?>
	  </tbody>
	</table>
</div>