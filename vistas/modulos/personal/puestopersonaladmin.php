<div class="container">

	<div class="col-md-2 float-right" style="margin-top: 10px">
		<?php

		require_once('php/conexion.php');

		echo '<form method="POST" action="php/sesionpersonalagregarpuesto.php">
						<input type="hidden" value="'.$_SESSION["idpuesto"].'" name="idagregarpuesto" />
						<button type="submit" class=" col-12 btn btn-success"><label for="" class="fas fa-plus"> </label></button>
			</form>';
		?>
	</div>
	<h3 style="margin-top: 10px">Lista de Puestos</h3>

	<table class="table table-hover" style="margin-top: 30px">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Puesto</th>
	      <th scope="col">Departamento</th>
	      <th scope="col">Eliminar</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php

	    $conexion = new Conexion;
		$con = $conexion->conexion(); 
		$consulta = "select pd.id as id, pu.nombre as puesto, d.nombre as departamento from puestodepartamento pd join personal p on pd.personal = p.id join departamento d on d.id = pd.departamento join puesto pu on pu.id = pd.puesto where p.id =".$_SESSION["idpuesto"];
		$resultado = $con->query($consulta);
		if(!$resultado) die ("Error al realizar la consulta");

		$renglones = $resultado->num_rows;
		for($i = 0; $i<$renglones; $i++){
			$renglon = $resultado->fetch_array(MYSQLI_ASSOC);

		
	    echo '<tr>
			      <th scope="row">'.$renglon["puesto"].'</th>
			      <td>'.$renglon["departamento"].'</td>
			      <td>
					<form method="POST" action="php/modelopersonalpuesto.php">
						<input type="hidden" value="'.$renglon['id'].'" name="idpuestodepartamento" />
						<button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
					</form>
			      </td>
	    	</tr>';
	    }

	    ?>
	  </tbody>
	</table>
</div>