<?php
    session_start(); // Inicia la sesión

    $con=mysqli_connect("localhost","root","","fitsport"); // Conexión a la base de datos
    // Revisar la conexión a la base de datos
    if($con==false){
        die ("Error, no hay conexión a la base de datos".mysqli_connect_error()); // Muestra un mensaje de error si no se pudo establecer la conexión a la base de datos
    }
    $nombreUsuario=$_SESSION['nombre_usuario']; // Obtener el nombre de usuario de la sesión
    $sql = "SELECT id FROM login WHERE user = '$nombreUsuario'"; // Consulta SQL para obtener el ID del usuario basado en su nombre de usuario
    $resultado = mysqli_query($con, $sql); // Ejecuta la consulta en la base de datos
    // Verificar si se encontró el registro del usuario
    if (mysqli_num_rows($resultado) > 0) {
        // Obtener el ID del usuario del resultado de la consulta
        $fila = mysqli_fetch_assoc($resultado);
        $user_id = $fila['id'];
        $consulta= "SELECT id FROM usuarios WHERE id_login = '$user_id'"; // Consulta SQL para obtener el ID del usuario en la tabla 'usuarios'
        $resultado2 = mysqli_query($con, $consulta); // Ejecuta la consulta en la base de datos

        if (mysqli_num_rows($resultado2) > 0) {
            $usuario = mysqli_fetch_assoc($resultado2);
            $idUsuario =  $usuario['id'];
            echo $idUsuario; // Muestra el ID del usuario obtenido
        }
    } else {
        // Si no se encuentra el registro del usuario, manejar el error aquí
    }
    $nombre = $_POST['nombre']; // Obtener el valor del campo 'nombre' del formulario
    $descripcion = $_POST['descripcion']; // Obtener el valor del campo 'descripcion' del formulario
    $sql2= "SELECT tipo_usuario FROM usuarios WHERE id_login = '$user_id'"; // Consulta SQL para obtener el tipo de usuario basado en el ID del usuario
    $verificar = mysqli_query($con, $sql2); // Ejecuta la consulta en la base de datos
    if (mysqli_num_rows($verificar) > 0) {
        $tipo = mysqli_fetch_assoc($verificar);
        $tipoUsuario = $tipo['tipo_usuario']; // Obtiene el tipo de usuario del resultado de la consulta
    }
    $consulta= "SELECT * FROM rutinas WHERE id = '$idUsuario'"; // Consulta SQL para obtener las rutinas del usuario basado en su ID
    $verificar2 = mysqli_query($con, $consulta); // Ejecuta la consulta en la base de datos
    if ($tipoUsuario == 'F' && mysqli_num_rows($verificar2) >= 1){ // Verifica si el usuario es de tipo 'F' (Free) y tiene al menos una rutina registrada
        echo '<script>
        const myModal = new bootstrap.Modal(document.getElementById("myModal"));
        myModal.show();
        </script>'; // Muestra un modal usando Bootstrap si el usuario cumple con las condiciones
    }else{
        $sql = "INSERT INTO rutinas (nombre, descripcion, id_usuario) VALUES ('$nombre', '$descripcion', $idUsuario)"; // Consulta SQL para insertar una nueva rutina en la base de datos
        if (mysqli_query($con, $sql)) { // Ejecuta la consulta en la base de datos
            header("Location: rutinas.php"); // Redirecciona a la página 'rutinas
        } else {
            echo "Error al agregar la meta: " . mysqli_error($con);// si no se puede agregar la meta muestra un error
        }
    }
    mysqli_close($con);// se cierra la conexion
?>
