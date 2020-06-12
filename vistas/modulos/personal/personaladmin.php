<div class="container">

	

	<div class="col-md-2 float-right" style="margin-top: 10px">
		<?php

		require_once('php/conexion.php');

		include 'agregarpersonaladmin.php';

		?>
	</div>
	<h4 style="margin-top: 10px">Lista del Personal</h4>

	<table class="table table-hover" style="margin-top: 30px">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Id</th>
	      <th scope="col">Titulo</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">A. Paterno</th>
	      <th scope="col">A. Materno</th>
	      <th scope="col">Correo</th>
	      <th scope="col">Puesto</th>
	      <th scope="col">Ver</th>
	      <th scope="col">Editar</th>
	      <th scope="col">Eliminar</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php

	    $conexion = new Conexion;
		$con = $conexion->conexion(); 
		$consulta = "SELECT * FROM personal";
		$resultado = $con->query($consulta);
		if(!$resultado) die ("Error al realizar la consulta");

		$renglones = $resultado->num_rows;
		for($i = 0; $i<$renglones; $i++){
			$renglon = $resultado->fetch_array(MYSQLI_ASSOC);

	    echo '<tr>
			      <th scope="row">'.$renglon["id"].'</th>
			      <td>'.$renglon["titulo"].'</td>
			      <td>'.$renglon["nombre"].'</td>
			      <td>'.$renglon["paterno"].'</td>
			      <td>'.$renglon["materno"].'</td>
			      <td>'.$renglon["correo"].'</td>
			      <td>

				    <form method="POST" action="php/sesionPersonalPuesto.php">
						<input type="hidden" value="'.$renglon['id'].'" name="idpuesto" />
						<button type="submit" class="btn btn-primary"><i class="fas fa-user-tie"></i></button>
					</form>
			      </td>
			      <td>
			      	<form method="POST" action="php/sesionPersonalVer.php">
						<input type="hidden" value="'.$renglon['id'].'" name="idver" />
						<button type="submit" class="btn btn-info"><i class="fas fa-eye"></i></button>
					</form>
			      </td>
			      <td>
					<form method="POST" action="php/sesionPersonalEditar.php">
						<input type="hidden" value="'.$renglon['id'].'" name="idedit" />
						<button type="submit" class="btn btn-warning"><i class="fas fa-user-edit"></i></button>
					</form>
			      </td>
			      <td>
					<form method="POST" action="php/modelopersonal.php">
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