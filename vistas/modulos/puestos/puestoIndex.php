<div class="container">	

	<div class="col-md-2 float-right" style="margin-top: 10px">
		<?php

		require_once('php/conexion.php');

		include 'agregar.php';

		?>
	</div>
	<h4 style="margin-top: 10px">Lista del Puestos</h4>

	<table class="table table-hover" style="margin-top: 30px">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Personal</th>
	      <th scope="col">Editar</th>
	      <th scope="col">Eliminar</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php

	    $conexion = new Conexion;
		$con = $conexion->conexion(); 
		$consulta = "SELECT * FROM puesto";
		$resultado = $con->query($consulta);
		if(!$resultado) die ("Error al realizar la consulta");

		$renglones = $resultado->num_rows;
		for($i = 0; $i<$renglones; $i++){
			$renglon = $resultado->fetch_array(MYSQLI_ASSOC);

	    echo '<tr>
			      <th scope="row">'.$renglon["id"].'</th>
			      <td>'.$renglon["nombre"].'</td>
			      <td>
			      	<form method="POST" action="php/puestos/puestoVisualizar.php">
						<input type="hidden" value="'.$renglon['id'].'" name="idver" />
						<button type="submit" class="btn btn-info"><i class="fas fa-book"></i></button>
					</form>
			      </td>
			      <td>
					<form method="POST" action="php/puestos/puestoEditar.php">
						<input type="hidden" value="'.$renglon['id'].'" name="idedit" />
						<button type="submit" class="btn btn-warning"><i class="fas fa-user-edit"></i></button>
					</form>
			      </td>
			      <td>
					<form method="POST" action="php/modeloPuesto.php">
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