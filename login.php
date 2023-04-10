<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FitSport</title> 
    <link rel="shortcut icon" href="images/dumbbell.png">
    <!-- Archivos de Bootstrap 5 -->
    <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <script src="css/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Theme style -->
    <link rel="stylesheet" href="css/admin-lte/dist/css/adminlte.min.css">

    <!--Estilos -->
    <link href="css/estilos.css" rel="stylesheet">
  </head>

  <body class="image">
    <form method="post" action="login.php">
      <div style="display: flex;  justify-content: center; align-items: center;">
        <div class="form-structor" style="height: 95vh;">
          <div class="signup ">
            <h2 class="form-title" id="signup"><span>o</span> Iniciar Sesión </h2>
            <div class="form-holder">
              <input type="text" class="input" name="usuario" id="usuario" placeholder="Usuario" required>
              <input type="password" class="input" id="contra" name="contra" placeholder="Password" required>
            </div>
            <button class="submit-btn" id="submit_login" type="submit">Iniciar Sesión</button>
          </div>
          <div class="login slide-up">
            <div class="center">
              <h2 class="form-title" id="login"><span>o</span>Registrarse</h2>
              
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Datos Incorrectos</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <center>
              <p id="modal-content" class="fs-5">Usuario o contraseña incorrectos<br>Intente de Nuevo!</p>
              <div style="display: flex; justify-content: right; ">
                <button type="button" class=" modal-btn" data-bs-dismiss="modal">Regresar</button>
              </div>
            </center>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->

    <script src="js/app2.js"></script>
  </body>
</html>

<?php
  //conexion a la base de datos(servidor, usuario, constraseña, nombreBD )
  $con=mysqli_connect("localhost","root","","fitsport");
  //revisar conexion
  if($con==false){
  die ("Error, no hay conexion a la base de datos".mysqli_connect_error());
  }
  session_start(); // iniciar la sesión para poder acceder a las variables de sesión
  //tomar los valores del fromulario a traves de los datos de los campos
  if (isset($_POST['usuario'], $_POST['contra'])){
    $user=$_POST['usuario'];
    $password=$_POST['contra'];

    $sql="SELECT id,user,password FROM login WHERE user='$user' and password='$password'";
    $resultado=mysqli_query($con,$sql);
    $filas=mysqli_num_rows($resultado);
    $fila = $resultado->fetch_assoc();
    $idUsuario = $fila["id"];
    $sql2="SELECT fotografia FROM usuarios WHERE id_login='$idUsuario'";
    $resultado2=mysqli_query($con,$sql2);
    $fila2 = $resultado2->fetch_assoc();
    $imagen = $fila2["fotografia"];
    if ($filas>0){
      $_SESSION['nombre_usuario'] = $user; // establecer la variable de sesión con el nombre del usuario
      $_SESSION['id']=$idUsuario;
      $_SESSION['fotografia']=$imagen;
      header('Location: dashboard.php');
    }else{ 
      echo '<script>
      const myModal = new bootstrap.Modal(document.getElementById("myModal"));
      myModal.show();
      </script>';

    }
  }

    
  
  

?>