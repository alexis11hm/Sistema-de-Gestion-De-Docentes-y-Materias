<?php
 
class Conexion{ 

    private $host   ="localhost";
    private $usuario="root";
    private $clave  ="";
    private $db     ="sistematec";
    

    public function conexion(){
    	$con = new mysqli($this->host,$this->usuario,$this->clave,$this->db);

    	if($con->connect_error){
    		echo "<script>alert('Error de conexion!')</script>";
		}else{
			//echo "<script>alert('Conexion con exito!')</script>";
			return $con;
		}
    }

}

?>