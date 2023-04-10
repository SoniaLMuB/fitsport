<?php 
    //Conexión base de datos
    $con = mysqli_connect("localhost","root","",  "fitsport");
        
    //Revisar conexión
    if($con == false){
        die("Error, no hay conexión a la base de datos ".mysqli_connect_error());
    }

    //Tomar los 5 valores del formulario a través de los datos de los campos
    $name = $_POST['name'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    //echo "datos: $code, $name, $selector_cate, $venta, $compra";
    $last_id = mysqli_insert_id($con); // Obtener el valor autoincrementable generado

    echo $last_id." ".$name." ".$description." ".$date;

    //Ejecutra el query de inserción de datos
    $sql = "INSERT INTO evento VALUES ('$last_id','$name','$description','$date','1','1')";

    if ($con->query($sql) === TRUE) {
        echo "Los datos fueron insertados correctamente.";
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }

    //cerrar conexión
    mysqli_close($con);

?>