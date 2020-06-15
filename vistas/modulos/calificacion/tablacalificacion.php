<div class="container">

	<div class="col-md-2 float-right" style="margin-top: 10px">
		<?php

		require_once('php/conexion.php');

		include 'agregarcalificacion.php';

		?>
	</div>
	<h4 style="margin-top: 10px">Lista de Calificaciones</h4>

	<table class="table table-hover" style="margin-top: 30px">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Materia</th>
	      <th scope="col">Unidad</th>
	      <th scope="col">Grupo</th>
	      <th scope="col">Año</th>
	      <th scope="col">Semestre</th>
	      <th scope="col">Fecha</th>
	      <th scope="col">Ver</th>
	      <th scope="col">Editar</th>
	      <th scope="col">Eliminar</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php

	    $conexion = new Conexion;
		$con = $conexion->conexion(); 
		$consulta = "select c.id as id, m.nombre as materia, c.unidad as unidad, c.documento as documento, c.fecha as fecha,grupo,anio,semestre from calificacion c join docentemateria dm on dm.id = c.docentemateria join materia m on m.id=dm.materia join puestodepartamento pd on dm.puestodepartamento=pd.id join personal p on p.id=pd.personal where p.id=".$_SESSION['id'];
		$resultado = $con->query($consulta);
		if(!$resultado) die ("No existen materias registradas");

		$renglones = $resultado->num_rows;
		for($i = 0; $i<$renglones; $i++){
			$renglon = $resultado->fetch_array(MYSQLI_ASSOC);

	    echo '<tr>
			      <th scope="row">'.$renglon["id"].'</th>
			      <td>'.$renglon["materia"].'</td>
			      <td>'.$renglon["unidad"].'</td>
			      <td>'.$renglon["grupo"].'</td>
			      <td>'.$renglon["anio"].'</td>';

			      if($renglon["semestre"] == 1){
			      	echo '<td> Enero - Junio </td>';
			      }else{
			      	echo '<td> Agosto - Diciembre </td>';
			      }

			      echo '<td>'.$renglon["fecha"].'</td>
			      <td>
			      	<form method="POST" action="php/SesionesCalificaciones/sesionVisualizar.php">
						<input type="hidden" value="'.$renglon["documento"].'" name="ruta" />
						<button type="submit" class="btn btn-info"><i class="fas fa-eye"></i></button>
					</form>
			      </td>
			      <td>
			      	<form method="POST" action="php/SesionesCalificaciones/sesionEditar.php">
						<input type="hidden" value="'.$renglon["id"].'" name="idedit" />
						<button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i></button>
					</form>
			      </td>
			      <td>
					<form method="POST" action="php/modeloCalificacion.php">
						<input type="hidden" value="'.$renglon["id"].'" name="ideliminarcalificacion" />
						<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
					</form>
			      </td>
	    	</tr>';
	    }

	    ?>
	  </tbody>
	</table>
</div>