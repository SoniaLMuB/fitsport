<?php
// Conectar a la base de datos
$con = mysqli_connect("localhost", "root", "", "fitsport");

// Recuperar la calificación y el ID del gimnasio desde el formulario
$calificacion = $_POST['calificacion'];

$id_gimnasio = $_POST['gimnasio_id'];
echo $id_gimnasio;
//revisar conexion
if($con==false){
    die ("Error, no hay conexion a la base de datos".mysqli_connect_error());
}
$sql0 = "INSERT INTO opiniones(id_gimnasio, calificacion) VALUES (" . $id_gimnasio . ", " . $calificacion . ")";

$resultado0=mysqli_query($con,$sql0);

// Redirigir al usuario a la página del gimnasio
header("Location: gym.php");
exit();

?>