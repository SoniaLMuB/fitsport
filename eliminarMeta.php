<?php
session_start();

// Conectar a la base de datos
$con=mysqli_connect("localhost","root","","fitsport");

// Verificar si hay error en la conexión a la base de datos
if($con==false){
  die ("Error, no hay conexion a la base de datos".mysqli_connect_error());
}

// Verificar si se recibió el ID del elemento a eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ejecutar la consulta SQL para eliminar el elemento con el ID especificado
    $sql = "DELETE FROM evento WHERE id = $id ";

    // Verificar si la consulta se ejecutó correctamente
    if (mysqli_query($con, $sql)) {
        // Si la consulta se ejecuta correctamente, redireccionar al usuario a la página de metas
        header("Location: metasBuena.php");
        exit();
    } else {
        // Si la consulta falla, mostrar un mensaje de error
        echo "Error al eliminar la meta: " . mysqli_error($con);
    }
} else {
    // Si no se recibe el ID del elemento a eliminar, mostrar un mensaje de error
    echo "ID de la meta no especificado";
}
?>