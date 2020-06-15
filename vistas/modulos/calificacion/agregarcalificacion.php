<?php

require_once('php/conexion.php');
$conexion = new Conexion;
$con = $conexion->conexion();

?>

<div class="container">

	  <!-- Button trigger modal -->
	<button type="button" class=" col-12 btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
	   <label for="" class="fas fa-plus"> </label>
	</button>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Calificacion</h5>
	        
	      </div>

	      <form method="POST" action="php/modeloCalificacion.php" enctype="multipart/form-data">
	      <div class="modal-body">
	        <div class="card">
		    <div class="card-body register-card-body">
		      <p class="login-box-msg"><b>Registrar Calificaciones</b></p>
				
				<div class="input-group mb-3">
		          <select class="form-control" name="docentemateriaa" required="">
			      <?php

			       $conexion = new Conexion;
			       $con = $conexion->conexion(); 
			       $consulta = "select p.nombre as nombre_persona,p.id as id_persona,m.nombre as materia,dm.id as id_docentemateria, anio,semestre,grupo from personal p join puestodepartamento pd on p.id = pd.personal join puesto pu on pu.id = pd.puesto join departamento d on d.id = pd.departamento join docentemateria dm on dm.puestodepartamento = pd.id join materia m on m.id = dm.materia having id_persona =".$_SESSION['id'];
			       $resultado = $con->query($consulta);
			       if(!$resultado) die ("Error al realizar la consulta");

			       $renglones = $resultado->num_rows;
			       for($i = 0; $i<$renglones; $i++){
			       	$renglon = $resultado->fetch_array(MYSQLI_ASSOC);
			       	if($renglon['semestre'] == 1){
			       		echo '<option value="'.$renglon['id_docentemateria'].'">'.$renglon['materia']." - ".$renglon['anio'].' - '.$renglon['grupo'].' - Enero / Junio </option>';
			       	}else{
			       		echo '<option value="'.$renglon['id_docentemateria'].'">'.$renglon['materia']." - ".$renglon['anio'].' - '.$renglon['grupo'].' - Agosto / Diciembre </option>';
			       	}
			       
			       }

			      ?>
		           </select>
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-square"></span>
		            </div>
		          </div>
		        </div>
		      
		       

		        <div class="input-group mb-3">
		          <input type="file" class="form-control" placeholder="Documento" name="documentoa" required="" onkeyup="" accept=".csv">
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-square"></span>
		            </div>
		          </div>
		        </div>

		        <div class="input-group mb-3">
					
					<select name="unidada" class="form-control" id="">
						<option value="1">I</option>
						<option value="2">II</option>
						<option value="3">III</option>
						<option value="4">IV</option>
						<option value="5">V</option>
						<option value="6">VI</option>
						<option value="7">VII</option>
					</select>

		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-square"></span>
		            </div>
		          </div>
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