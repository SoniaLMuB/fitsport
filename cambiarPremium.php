<?php
if (session_status() == PHP_SESSION_NONE) {
    // Iniciar la sesión
    session_start();
}


  $con=mysqli_connect("localhost","root","","fitsport");
  //revisar conexion
  if($con==false){
    die ("Error, no hay conexion a la base de datos".mysqli_connect_error());
  }
  $sql= "UPDATE usuarios SET tipo_usuario='P' WHERE id_login=".$_SESSION['id'];

  $resultado = mysqli_query($con, $sql);
  if (!$resultado) {
    echo "no se puede actualizar";
  } else {
    header("location: perfil.php");
  }
?>