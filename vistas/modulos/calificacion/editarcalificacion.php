<?php
require_once("php/conexion.php");
$conexion = new Conexion;
$con = $conexion->conexion(); 


$consultaaux = "select dm.id as id_docentemateria, m.nombre as materia from docentemateria dm join materia m on m.id = dm.materia join calificacion c on c.docentemateria = dm.id where c.id =".$_SESSION['idedit'];
$resultadoaux = $con->query($consultaaux);
if(!$resultadoaux) die ("Error al realizar la consulta");
$renglonaux = $resultadoaux->fetch_array(MYSQLI_ASSOC);


$consulta = "select p.nombre as nombre_persona,p.id as id_persona,m.nombre as materia,dm.id as id_docentemateria from personal p join puestodepartamento pd on p.id = pd.personal join puesto pu on pu.id = pd.puesto join departamento d on d.id = pd.departamento join docentemateria dm on dm.puestodepartamento = pd.id join materia m on m.id = dm.materia having id_persona =".$_SESSION['id'];
$resultado = $con->query($consulta);
if(!$resultado) die ("Error al realizar la consulta");

$renglones = $resultado->num_rows;


?>
<div class="container">	
<form method="POST" action="php/modeloCalificacion.php" enctype="multipart/form-data">
	      
		     	<br><h4>Editar Datos de Calificaciones</h4><br>	

		        <div class="input-group mb-3">
		          <select class="form-control" name="docentemateriae" required="">
			     	<?php
			     		for($i = 0; $i<$renglones; $i++){
							$renglon = $resultado->fetch_array(MYSQLI_ASSOC);
							if($renglon['id_docentemateria'] == $renglonaux['id_docentemateria']){
								echo '<option selected value="'.$renglon['id_docentemateria'].'">'.$renglon['materia'].'</option>';
							}else{

								echo '<option value="'.$renglon['id_docentemateria'].'">'.$renglon['materia'].'</option>';
							}
						}
			     	?>
		          </select>
		        </div>

				
		        <?php

		        $consulta = "select * from calificacion where id = ".$_SESSION['idedit'];
		        $resultado = $con->query($consulta);
		        $con->close();
		        if(!$resultado) die ("Error al realizar la consulta");

		        $renglon = $resultado->fetch_array(MYSQLI_ASSOC);

		        ?>

				
				<label for="">Documento</label>
		        <div class="input-group mb-3">
		          <input type="file" class="form-control" placeholder="Documento" name="documentoe" onkeyup="" maxlength="30"  value="<?php echo $renglon["documento"]; ?>">
		        </div>
		        <div class="input-group mb-3">
		          <label><?php echo str_replace("archivos/","", $renglon["documento"]); ?></label>
		        </div>


				<label for="">Unidad</label>
		        <div class="input-group mb-3">
		          <input type="number" class="form-control" placeholder="Unidad" name="unidade"  required="" onkeyup="" maxlength="30"  value="<?php echo $renglon["unidad"]; ?>" max="8" min="1">
		        </div>

		      
	        <input type="submit" class="btn btn-primary" name="registrar" value="Guardar Datos">
	      
	      </form>
	      </div>