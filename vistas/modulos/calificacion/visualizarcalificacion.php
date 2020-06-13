<div class="container">

	<div class="col-md-2 float-right" style="margin-top: 10px">
		
	</div>
	<h4 style="margin-top: 10px">Calificaciones</h4>

	<table class="table table-hover" style="margin-top: 30px">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">Numero de Control</th>
	      <th scope="col">Nombre Completo</th>
	      <th scope="col">Calificación</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php

	  	$ruta = "php/".$_SESSION['rutavisualizarcalificacion'];

	  	if(file_exists($ruta)){
	  		$fh = fopen($ruta, 'r');
		  	while ($data = fgetcsv ($fh, 1000, ",")) {
		  		$num = count ($data);
		  		echo "
		  		<tr>
		  		<th scope='row'>".$data[0]."</th>
		  		<td>".$data[1]."</td>
		  		<td>".$data[2]."</td>
		  		</tr>
		  		";
		  	}

		  	fclose($fh);
	  	}else{
	  		echo "No encontrado";
	  	}

	  	?>
	  </tbody>
	</table>
</div>