<div class="container">

	  <!-- Button trigger modal -->
	<button type="button" class=" col-12 btn btn-success" data-toggle="modal" data-target="#modalAgregarMateria">
	   <label for="" class="fas fa-plus"> </label>
	</button>

	<!-- Modal -->
	<div class="modal fade" id="modalAgregarMateria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Materia</h5>
	      </div>

	      <form method="POST" action="php/modeloMateria.php" enctype="multipart/form-data">
	      <div class="modal-body">
	        <div class="card">
		    <div class="card-body register-card-body">
		      <p class="login-box-msg"><b>Registrar Materia</b></p>

		      
		        <div class="input-group mb-3">
		          <input type="text" class="form-control" placeholder="Nombre" name="nombre" required="" >
		          <div class="input-group-append" onkeyup="" maxlength="30">
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