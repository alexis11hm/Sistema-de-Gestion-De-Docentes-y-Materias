<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema ITZ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plugins/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>




  <?php

	  echo '<body class="hold-transition sidebar-mini layout-fixed">
			<div class="wrapper">';

	if(isset($_SESSION["validarSesion"]) && isset($_SESSION['tipo'])){

		if($_SESSION['tipo'] == "admin"){


			include "vistas/modulos/navegadoradmin.php";

			include "vistas/modulos/lateraladmin.php";

			echo '<!-- Content Wrapper. Contains page content -->
					  <div class="content-wrapper">

					    <section class="content">
					      <div class="container-fluid">';
					       

			/*AQUI SE AGREGARA EL CONTENIDO*/
			if(isset($_SESSION["vistapersonal"])){
				include "vistas/modulos/personal/personaladmin.php";
			}else if(isset($_SESSION["vistapersonalver"])){
				include "vistas/modulos/personal/visualizarpersonaladmin.php";
			}else if(isset($_SESSION["vistapersonaledit"])){
				include "vistas/modulos/personal/editarpersonaladmin.php";
			}elseif(isset($_SESSION["vistapersonalpuesto"])){
				include 'vistas/modulos/personal/puestopersonaladmin.php';
			}else if(isset($_SESSION["vistapersonalagregarpuesto"])){
				include 'vistas/modulos/personal/agregarpersonalpuestoadmin.php';
			}else{
				include "vistas/modulos/contenidoadmin.php";
			}

			echo ' </div>
					    </section>
					  </div>';

			include "vistas/modulos/pie.php";

			echo '<!-- Control Sidebar -->
				  <aside class="control-sidebar control-sidebar-dark">
				    <!-- Control sidebar content goes here -->
				  </aside>
				  <!-- /.control-sidebar -->';

		}else{



			include "vistas/modulos/navegadorpersonal.php";

			include "vistas/modulos/lateralpersonal.php";

			echo '<!-- Content Wrapper. Contains page content -->
					  <div class="content-wrapper">

					    <section class="content">
					      <div class="container-fluid">';
					       

			/*AQUI SE AGREGARA EL CONTENIDO*/
			if(isset($_SESSION["vistatabla"])){
				include "vistas/modulos/calificacion/tablacalificacion.php";
			}else if(isset($_SESSION['vistavisualizarcalificacion'])){
				include "vistas/modulos/calificacion/visualizarcalificacion.php";
			}else{
				include "vistas/modulos/contenidopersonal.php";
			}

			echo ' </div>
					    </section>
					  </div>';

			include "vistas/modulos/pie.php";

			echo '<!-- Control Sidebar -->
				  <aside class="control-sidebar control-sidebar-dark">
				    <!-- Control sidebar content goes here -->
				  </aside>
				  <!-- /.control-sidebar -->';

		}
		
		
		
	}else{

		include "vistas/login.php";



	}

?>

  


  
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap 
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="plugins/dist/js/demo.js"></script>
</body>
</html>
