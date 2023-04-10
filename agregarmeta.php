<?php
    session_start();
    $con=mysqli_connect("localhost","root","","fitsport");

    //revisar conexion
    if($con==false){
        die ("Error, no hay conexion a la base de datos".mysqli_connect_error());
    }
    
    $nombreUsuario=$_SESSION['nombre_usuario'];
    $sql = "SELECT id FROM login WHERE user = '$nombreUsuario'";
    $resultado = mysqli_query($con, $sql);

    // Verifica si se encontró el registro del usuario
    if (mysqli_num_rows($resultado) > 0) {
        // Obtiene el ID del usuario del resultado de la consulta
        $fila = mysqli_fetch_assoc($resultado);
        $user_id = $fila['id'];
        // Ahora tienes el ID del usuario que corresponde al nombre de usuario dado
    } else {
        // Si no se encuentra el registro del usuario, maneja el error aquí
    }

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];

    $sql2= "SELECT tipo_usuario FROM usuarios WHERE id_login = '$user_id'";
    $verificar = mysqli_query($con, $sql2);
    if (mysqli_num_rows($verificar) > 0) {
        $tipo = mysqli_fetch_assoc($verificar);
        $tipoUsuario = $tipo['tipo_usuario'];
    }

    $consulta= "SELECT * FROM evento WHERE id_login = '$user_id' AND id_evento = 1";
    $verificar2 = mysqli_query($con, $consulta);
    if ($tipoUsuario == 'F' && mysqli_num_rows($verificar2) >= 1){
        echo '<script>
      const myModal = new bootstrap.Modal(document.getElementById("myModal"));
      myModal.show();
      </script>';

    }else{
        $sql = "INSERT INTO evento (nombre, descripcion, fecha, id_login,id_evento) VALUES ('$nombre', '$descripcion', '$fecha', $user_id,1)";
        if (mysqli_query($con, $sql)) {
            header("Location: metasBuena.php");
        } else {
             echo "Error al agregar la meta: " . mysqli_error($con);
        }
    }
        
    

    mysqli_close($con);
?>
