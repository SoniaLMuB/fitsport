<?php
session_start();
$con=mysqli_connect("localhost","root","","fitsport");

if($con==false){
  die ("Error, no hay conexion a la base de datos".mysqli_connect_error());
}

// Verifica si se recibió el ID del elemento a eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ejecuta la consulta SQL para eliminar el elemento
    $sql = "DELETE FROM rutinas WHERE id = $id ";
    if (mysqli_query($con, $sql)) {
        // Si la consulta se ejecuta correctamente, redirecciona al usuario a la página de metas
        header("Location: rutinas.php");
        exit();
    } else {
        // Si la consulta falla, muestra un mensaje de error
        echo "Error al eliminar la meta: " . mysqli_error($con);
    }
} else {
    // Si no se recibe el ID del elemento a eliminar, muestra un mensaje de error
    echo "ID de la meta no especificado";
}
?>
