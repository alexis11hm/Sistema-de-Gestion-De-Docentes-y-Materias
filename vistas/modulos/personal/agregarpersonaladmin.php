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
	        <h5 class="modal-title" id="exampleModalLongTitle">Personal</h5>
	        
	      </div>

	      <form method="POST" action="php/modelopersonal.php" enctype="multipart/form-data">
	      <div class="modal-body">
	        <div class="card">
		    <div class="card-body register-card-body">
		      <p class="login-box-msg"><b>Registrar Personal</b></p>

		      
		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="Titulo" name="tituloa" required="" >
		          <div class="input-group-append" onkeyup="" maxlength="30">
		            <div class="input-group-text">
		              <span class="fas fa-square"></span>
		            </div>
		          </div>
		        </div>

		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="Nombre" name="nombrea" required="" onkeyup="" maxlength="30">
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-square"></span>
		            </div>
		          </div>
		        </div>


		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="Apellido Paterno" name="paternoa"  required="" onkeyup="" maxlength="30">
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-square"></span>
		            </div>
		          </div>
		        </div>


		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="Apellido Materno" name="maternoa"  required="" onkeyup="" maxlength="30">
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-square"></span>
		            </div>
		          </div>
		        </div>
				
				<!--CAMBIAR EL SEXO POR RADIO BUTTON-->
		        <div class="input-group mb-3">
		        	<input type="radio" class="form-control"  value="Hombre" name="sexoa" checked="">Hombre
		        	<input type="radio" class="form-control"  value="Mujer" name="sexoa" >Mujer
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-square"></span>
		            </div>
		          </div>
		        </div>

		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="RFC" name="rfca" required="" onkeyup="" maxlength="13">
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-square"></span>
		            </div>
		          </div>
		        </div>

		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="curp" name="curpa" required="" onkeyup="" maxlength="18">
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-square"></span>
		            </div>
		          </div>
		        </div>

		        <div class="input-group mb-3">
		          <input type="file" class="form-control" placeholder="Foto" name="fotoa" required="" onkeyup="" accept=".png, .jpg, .jpeg">
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-square"></span>
		            </div>
		          </div>
		        </div>

		        <div class="input-group mb-3">
		          <input type="email" class="form-control" placeholder="Correo Electronico" name="correoa"  required="" onkeyup="" maxlength="30">
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-square"></span>
		            </div>
		          </div>
		        </div>

		        <div class="input-group mb-3">
		          <input type="password" class="form-control" placeholder="Contraseña" name="passworda"  required="" onkeyup="" maxlength="30">
		          <div class="input-group-append">
		            <div class="input-group-text">
		              <span class="fas fa-square"></span>
		            </div>
		          </div>
		        </div>

		        <div class="input-group mb-3">
		          <select class="form-control" name="tipoa">
		              <option value="Administrador">Administrador</option>
		              <option value="Personal">Personal</option>
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