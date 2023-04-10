<?php 
    //Conexión base de datos
    $con = mysqli_connect("localhost","root","",  "fitsport");
        
    //Revisar conexión
    if($con == false){
        die("Error, no hay conexión a la base de datos ".mysqli_connect_error());
    }


    $id = $_GET['id'];
    //Ejecutra el query de inserción de datos

    $sql = "SELECT * FROM evento WHERE id = '$id'";
    //$sql = "SELECT nombre, descripcion, fecha FROM evento";
    $resultado = mysqli_query($con, $sql);

    // Enviar los eventos obtenidos en formato JSON
    $eventos = array();
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $eventos[] = $fila;
        }
    }
    echo json_encode($eventos);
    

    //cerrar conexión
    mysqli_close($con);

?>