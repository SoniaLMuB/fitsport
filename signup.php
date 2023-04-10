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
    <form method="post" action="signup.php">
      <div style="display: flex;  justify-content: center; align-items: center;">
        <div class="form-structor" style="height: 95vh;">
          <div class="signup slide-up">
            <h2 class="form-title" id="signup"><span>o</span> Iniciar Sesión </h2>
          </div>
          <div class="login ">
            <div class="center">
              <h2 class="form-title" id="login"><span>o</span>Registrarse</h2>
              <div class="form-holder">
                <input type="text" class="input" id="nombre" name="nombre" placeholder="Nombre" required>
                <input type="text" class="input" id="apellido" name="apellido" placeholder="Apellido" required>
                <input type="text" class="input" id="user" name="user" placeholder="Usuario" required>
                <input type="password" class="input" id="contrasena" name="contrasena" placeholder="Contraseña" required>
                <input type="password" class="input" id="confirmar-contrasena" name="confirmar-contrasena" placeholder="Confirmar contraseña" required>
                <input type="text" class="input" id="pais-residencia" name="pais-residencia" placeholder="País de residencia" required>
                <input type="date" class="input text-muted" id="fecha-nacimiento" name="fecha-nacimiento" placeholder="Fecha de nacimiento" required>
                <input type="email" class="input" id="correo" name="correo" placeholder="Correo electrónico" required>
                <input type="tel" class="input" id="telefono" name="telefono" placeholder="Teléfono">
              </div>
              <button class="submit-btn" type="submit">Registrarse</button>
              
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
  

  if (isset($_POST['nombre'], $_POST['apellido'], $_POST['user'], $_POST['contrasena'], $_POST['confirmar-contrasena'], $_POST['pais-residencia'], $_POST['fecha-nacimiento'])){
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $user=$_POST['user'];
    $password=$_POST['contrasena'];
    $contrasena=$_POST['confirmar-contrasena'];
    $pais=$_POST['pais-residencia'];
    $fecha=$_POST['fecha-nacimiento'];
    $correo=$_POST['correo'];
    $telefono=$_POST['telefono'];


    $sql="SELECT user FROM login WHERE user='$user'";
    $resultado=mysqli_query($con,$sql);
    $filas=mysqli_num_rows($resultado);
    if ($filas>0){
      echo '<script>
      const contenidoModal = document.getElementById("modal-content");
      const myModal = new bootstrap.Modal(document.getElementById("myModal"));
      contenidoModal.innerHTML = "El usuario ya existe<br>Intente de Nuevo!";
      myModal.show();
      </script>';
      return;
    }

    if ($password!=$contrasena) {
      echo '<script>
      const contenidoModal = document.getElementById("modal-content");
      const myModal = new bootstrap.Modal(document.getElementById("myModal"));
      contenidoModal.innerHTML = "Las contraseñas no coinciden<br>Intente de Nuevo!";
      myModal.show();
      </script>';
      return;
    }
    $sql="SELECT correo FROM usuarios WHERE correo='$correo'";
    $resultado=mysqli_query($con,$sql);
    $filas=mysqli_num_rows($resultado);
    if ($filas>0){
      echo '<script>
      const contenidoModal = document.getElementById("modal-content");
      const myModal = new bootstrap.Modal(document.getElementById("myModal"));
      contenidoModal.innerHTML = "El correo que ingresó ya pertenece a otra cuenta<br>Intente de Nuevo!";
      myModal.show();
      </script>';
      return;
    }

    echo $user;
    echo $password;

    $sql="INSERT INTO login (user,password) VALUES ('$user','$password')";
    $resultado=mysqli_query($con,$sql);

    $sql="INSERT INTO usuarios (nombre,apellido,fecha_nacimiento,pais,telefono,fotografia,correo,id_login) VALUES ('$nombre','$apellido','$fecha','$pais','$telefono','NULL','$correo',(SELECT id FROM login WHERE user='$user' and password='$password'))";
    $resultado=mysqli_query($con,$sql);
    if ($resultado){
      echo '<script>
      const contenidoModal = document.getElementById("modal-content");
      const myModal = new bootstrap.Modal(document.getElementById("myModal"));
      contenidoModal.innerHTML = "Su cuenta ha sido registrada<br>Ahora puede iniciar sesión!";
      myModal.show();
      </script>';
    }else{ 
      echo '<script>
      const contenidoModal = document.getElementById("modal-content");
      const myModal = new bootstrap.Modal(document.getElementById("myModal"));
      contenidoModal.innerHTML = "Hubo un error al registrarse<br>Intente de Nuevo";
      myModal.show();
      </script>';

    }
  }
  

?>