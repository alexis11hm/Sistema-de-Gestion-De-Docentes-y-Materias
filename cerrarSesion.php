<?php
	
	session_start();
	session_destroy();
	echo "<script>alert('Se ha cerrado la sesión correctamente!')</script>";
	echo '<script>window.location = "index.php" </script>';

 ?>