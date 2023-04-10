<?php
if (session_status() == PHP_SESSION_NONE) {
    // Iniciar la sesión
    session_start();
}

  $nombre=$_POST['nombre'];
  $apellido=$_POST['apellido'];
  $fecha_nacimiento=$_POST['fecha_nacimiento'];
  $pais=$_POST['pais'];
  $telefono=$_POST['telefono'];
  $correo=$_POST['correo'];
   $foto=$_POST['foto'];


  $con=mysqli_connect("localhost","root","","fitsport");
  //revisar conexion
  if($con==false){
    die ("Error, no hay conexion a la base de datos".mysqli_connect_error());
  }
  $sql= "UPDATE usuarios SET nombre='$nombre', apellido='$apellido', fecha_nacimiento='$fecha_nacimiento', telefono='$telefono', correo='$correo', pais='$pais',fotografia='$fotografia' WHERE id_login=".$_SESSION['id'];

  $resultado = mysqli_query($con, $sql);
  if (!$resultado) {
    echo "no se puede actualizar";
  } else {
    header("location: perfil.php");
  }
?>