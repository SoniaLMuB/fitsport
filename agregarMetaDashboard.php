<?php
    session_start();
    $con=mysqli_connect("localhost","root","","fitsport");
    // Revisar conexión a la base de datos
    if($con==false){
        die ("Error, no hay conexión a la base de datos".mysqli_connect_error());
    }
    // Obtener el nombre de usuario de la sesión actual
    $nombreUsuario=$_SESSION['nombre_usuario'];
    // Consulta para obtener el ID del usuario basado en su nombre de usuario
    $sql = "SELECT id FROM login WHERE user = '$nombreUsuario'";
    $resultado = mysqli_query($con, $sql);
    // Verificar si se encontró el registro del usuario
    if (mysqli_num_rows($resultado) > 0) {
        // Obtener el ID del usuario del resultado de la consulta
        $fila = mysqli_fetch_assoc($resultado);
        $user_id = $fila['id'];
        // Ahora tienes el ID del usuario que corresponde al nombre de usuario dado
    } else {
        // Si no se encuentra el registro del usuario, manejar el error aquí
    }
    // Obtener los valores del formulario
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    // Consulta para obtener el tipo de usuario del usuario actual
    $sql2= "SELECT tipo_usuario FROM usuarios WHERE id_login = '$user_id'";
    $verificar = mysqli_query($con, $sql2);
    if (mysqli_num_rows($verificar) > 0) {
        $tipo = mysqli_fetch_assoc($verificar);
        $tipoUsuario = $tipo['tipo_usuario'];
    }
    // Consulta para verificar si ya existe un evento con id_evento = 1 para el usuario actual
    $consulta= "SELECT * FROM evento WHERE id_login = '$user_id' AND id_evento = 1";
    $verificar2 = mysqli_query($con, $consulta);
    // Verificar si el tipo de usuario es 'F' y si ya existe un evento con id_evento = 1
    if ($tipoUsuario == 'F' && mysqli_num_rows($verificar2) >= 1){
        // Si el tipo de usuario es 'F' y ya existe un evento con id_evento = 1, muestra un modal
        echo '<script>
        const myModal = new bootstrap.Modal(document.getElementById("myModal"));
        myModal.show();
        </script>';
    } else {
        // Si no se cumple la condición anterior, inserta un nuevo evento en la base de datos
        $sql = "INSERT INTO evento (nombre, descripcion, fecha, id_login, id_evento) VALUES ('$nombre', '$descripcion', '$fecha', $user_id, 1)";
        if (mysqli_query($con, $sql)) {
            header("Location: dashboard.php"); // Redirige a la página de dashboard después de la inserción exitosa
        } else {
             echo "Error al agregar la meta: " . mysqli_error($con); // Muestra un mensaje de error si falla la inserción
        }
    } 
    mysqli_close($con); // Cierra la conexión a la base de datos
?>