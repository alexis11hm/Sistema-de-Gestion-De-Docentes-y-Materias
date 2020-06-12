<?php

require_once('php/conexion.php');
$conexion = new Conexion;
$con = $conexion->conexion(); 
$consulta = "SELECT * FROM personal where id = ".$_SESSION['idedit'];
$resultado = $con->query($consulta);
if(!$resultado) die ("Error al realizar la consulta");

$renglon = $resultado->fetch_array(MYSQLI_ASSOC);

 ?>

<div class="container">	
<form method="POST" action="php/modelopersonal.php" enctype="multipart/form-data">
	      
		     	<br><h4>Editar Personal</h4><br>	

		      	<div class="input-group mb-3">
		          <input type="hidden" class="form-control" placeholder="Titulo" name="ide" required="" 
		          value="<?php echo $renglon["id"]; ?>">
		        </div>

		        <label for="">Titulo</label>
		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="Titulo" name="tituloe" required="" 
		          value="<?php echo $renglon["titulo"]; ?>">
		        </div>
				
				<label for="">Nombre</label>
		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="Nombre" name="nombree" required="" onkeyup="" maxlength="30"  value="<?php echo $renglon["nombre"]; ?>">
		        </div>

				<label for="">Apellido Paterno</label>
		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="Apellido Paterno" name="paternoe"  required="" onkeyup="" maxlength="30"  value="<?php echo $renglon["paterno"]; ?>">
		        </div>

				<label for="">Apellido Materno</label>
		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="Apellido Materno" name="maternoe"  required="" onkeyup="" maxlength="30"  value="<?php echo $renglon["materno"]; ?>">
		        </div>
				
				<!--CAMBIAR EL SEXO POR RADIO BUTTON-->
				<label for="">Sexo</label>
		        <div class="input-group mb-3">
		        	<input type="radio" class="form-control"  value="Hombre" required name="sexoe">Hombre
		        	<input type="radio" class="form-control"  value="Mujer" name="sexoe">Mujer
		        </div>
				
				<label for="">RFC</label>
		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="RFC" name="rfce" required="" onkeyup="" maxlength="30"  value="<?php echo $renglon["rfc"]; ?>">
		        </div>
				
				<label for="">CURP</label>
		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="curp" name="curpe" required="" onkeyup="" maxlength="30"  value="<?php echo $renglon["curp"]; ?>">
		        </div>
				
				<label for="">Foto</label>
		        <div class="input-group mb-3">
		          <input type="file" class="form-control" placeholder="Foto" name="fotoe"required="" onkeyup="" maxlength="30"  value="<?php echo $renglon["foto"]; ?>">
		        </div>
				
				<label for="">Correo Electronico</label>
		        <div class="input-group mb-3">
		          <input type="email" class="form-control" placeholder="Correo Electronico" name="correoe"  required="" onkeyup="" maxlength="30"  value="<?php echo $renglon["correo"]; ?>">
		        </div>
				
				<label for="">Contraseña</label>
		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="Contraseña" name="passworde"  required="" onkeyup="" maxlength="30" value="<?php echo $renglon["password"]; ?>">
		        </div>

				<label for="">Tipo</label>
		        <div class="input-group mb-3">
		          <select class="form-control" name="tipoe">
		              <option value="Administrador">Administrador</option>
		              <option value="Personal">Personal</option>
		           </select>
		        </div>
		      
	        <input type="submit" class="btn btn-primary" name="registrar" value="Guardar Datos">
	      
	      </form>
	      </div>