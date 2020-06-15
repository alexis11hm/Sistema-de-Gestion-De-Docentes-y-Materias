
 <div class="container">    

    <div class="col-md-2 float-right" style="margin-top: 10px">
        <?php

        require_once('php/conexion.php');

        ?>
    </div>
    <h4 style="margin-top: 10px">Docentes que imparten <?php

        require_once('php/conexion.php');
        $conexion = new Conexion;
        $con = $conexion->conexion(); 
        $consulta = "SELECT * FROM materia where id = ".$_SESSION['idver'];
        $resultado = $con->query($consulta);
        if(!$resultado) die ("Error al realizar la consulta");
        $renglon = $resultado->fetch_array(MYSQLI_ASSOC);
        echo $renglon['nombre'];

    ?></h4>

    <table class="table table-hover" style="margin-top: 30px">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Paterno</th>
          <th scope="col">Materno</th>
          <th scope="col">Departamento</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $conexion = new Conexion;
        $con = $conexion->conexion(); 
        $idMateria = $_SESSION['idver'];

        $consulta = "SELECT personal.nombre as nombre, paterno,materno,departamento.nombre as departamento FROM docentemateria join puestodepartamento on docentemateria.puestodepartamento = puestodepartamento.id join personal on puestodepartamento.personal = personal.id join departamento on puestodepartamento.departamento = departamento.id join puesto on puestodepartamento.puesto = puesto.id where docentemateria.materia = ".$idMateria;

        $resultado = $con->query($consulta);
        if(!$resultado) die ("Error al realizar la consulta");

        $renglones = $resultado->num_rows;
        for($i = 0; $i<$renglones; $i++){
            $renglon = $resultado->fetch_array(MYSQLI_ASSOC);

        echo '<tr>
                  <td>'.$renglon["nombre"].'</td>
                  <td>'.$renglon["paterno"].'</td>
                  <td>'.$renglon["materno"].'</td>
                  <td>'.$renglon["departamento"].'</td>
            </tr>';
        }

        ?>
      </tbody>
    </table>
</div>