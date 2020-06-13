<?php
require_once('php/conexion.php');

if(isset($_POST['usuario']) && isset($_POST['password']) && isset($_POST['tipoacceso'])){



    $conexion = new Conexion;
    $con = $conexion->conexion();

    $consulta = "select p.id as id,p.nombre as nombre, pu.nombre as puesto, p.correo as correo, p.password as password,p.tipo as tipo from puestodepartamento pd join personal p on p.id = pd.personal join puesto pu on pu.id = pd.puesto join departamento d on d.id = pd.departamento where p.correo = '".$_POST['usuario']."' and p.password = '".$_POST['password']."'";

    $resultado = $con->query($consulta);
    if($resultado){
        $res = $resultado->fetch_array(MYSQLI_ASSOC);
        if($res!= null){


          $consultaaux = "select p.id as id,p.nombre as nombre, pu.nombre as puesto, p.correo as correo, p.password as password,p.tipo as tipo from puestodepartamento pd join personal p on p.id = pd.personal join puesto pu on pu.id = pd.puesto join departamento d on d.id = pd.departamento where p.correo = '".$_POST['usuario']."' and p.password = '".$_POST['password']."' and pu.nombre='Docente'";

          $resultadoaux = $con->query($consultaaux);
          $esDocente = 0;
          if($resultadoaux){
              $resaux = $resultadoaux->fetch_array(MYSQLI_ASSOC);
              if($resaux!=null){
                $esDocente = 1;
              }
          }

            if((($res['tipo'] == 1) && ($_POST['tipoacceso'] == "personal")) ||

              (($res['tipo'] == 2) &&  ($_POST['tipoacceso'] == "personal")  && $esDocente==1)){

              $_SESSION["id"] = $res['id'];
              $_SESSION["nombre"] = $res['nombre'];
              $_SESSION["usuario"] = $res['correo'];
              $_SESSION["password"] = $res['password'];
              $_SESSION["tipo"] = "personal";
              $_SESSION["validarSesion"] = "ok";


              if(isset($_POST['recordarme'])){
                setcookie("usuario", $_POST['usuario'], time()+3600);
                setcookie("password", $_POST['password'], time()+3600);
              }

              header('Location: index.php');

            }else if(($res['tipo'] == 2) && ($_POST['tipoacceso'] == "admin")){

              $_SESSION["id"] = $res['id'];
              $_SESSION["nombre"] = $res['nombre'];
              $_SESSION["usuario"] = $res['correo'];
              $_SESSION["password"] = $res['password'];
              $_SESSION["tipo"] = "admin";
              $_SESSION["validarSesion"] = "ok";

              
              if(isset($_POST['recordarme'])){
                setcookie("usuario", $_POST['usuario'], time()+3600);
                setcookie("password", $_POST['password'], time()+3600);
              }

              header('Location: index.php');
              
              
            }
        }else{
            echo "<script>alert('Usuario o contraseña incorrecta')</script>";
        }
    }else{
      echo "<script>alert('Error al realiazar la consulta')</script>";
    }
}

?>


<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de Personal ITZ</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plugins/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<div class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Inicio de Sesión</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <br>
      <center><img src="plugins/dist/img/login.png" alt="no encontrado" width="120px" height="120px"></center>
      <br>
      <p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="usuario" placeholder="Nombre de Usuario"
          value="<?php if(isset($_COOKIE['usuario'])){ echo $_COOKIE['usuario']; }else{ echo '';} ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Contraseña"
           value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; }else{ echo '';} ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3" style="transform:scale(0.8);">
              <input type="radio" class="form-control"  value="admin" name="tipoacceso" checked="">Admin
              <input type="radio" class="form-control"  value="personal" name="tipoacceso" >Personal
            
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="recordarme">
              <label for="remember">
                Recordarme
              </label>
            </div>
          </div>


          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i>    Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="plugins/dist/js/adminlte.min.js"></script>
<script src="plugins/sweetalert.js"></script>
</div>
</html>
