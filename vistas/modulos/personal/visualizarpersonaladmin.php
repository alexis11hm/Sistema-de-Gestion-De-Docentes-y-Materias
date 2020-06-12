 <?php

require_once('php/conexion.php');
$conexion = new Conexion;
$con = $conexion->conexion(); 
$consulta = "SELECT * FROM personal where id = ".$_SESSION['idver'];
$resultado = $con->query($consulta);
if(!$resultado) die ("Error al realizar la consulta");



$renglon = $resultado->fetch_array(MYSQLI_ASSOC);

 ?>

 <div class="container">
                <div class="card mb-3" style="max-width: 950px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            
                            <img src="<?php echo "php/".$renglon["foto"]; ?>" class="card-img" alt="Foto de Perfil">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-footer">
                                    <?php echo $renglon["nombre"]." ".$renglon["paterno"]
                                    ." ".$renglon["materno"]?>
                                </h2>
                                <p><h6 class="card-text">Titulo: <?php echo $renglon["titulo"]; ?></h6></p>
                                <p>
                                    <h6 class="card-text">
                                        Nombre Completo: <?php echo $renglon["nombre"]." ".$renglon["paterno"]." ".$renglon["materno"]?>
                                            
                                        </h6>
                                    </p>
                                <p><h6 class="card-text">Sexo: <?php echo $renglon["sexo"]; ?></h6></p>
                                <p><h6 class="card-text">RFC: <?php echo $renglon["rfc"]; ?></h6></p>
                                <p><h6 class="card-text">CURP: <?php echo $renglon["curp"]; ?></h6></p>
                                <p><h6 class="card-text">
                                    Correo Electronico: <?php echo $renglon["correo"]; ?>
                                        
                                    </h6>
                                </p>
                                <p><h6 class="card-text">
                                    Tipo: <?php if($renglon["titulo"] == 2){ echo 'Administrador'; }else{ echo 'Personal';} ?>
                                        
                                    </h6>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>