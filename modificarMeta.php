<?php
	// Conectar a la base de datos
	$con=mysqli_connect("localhost","root","","fitsport");

	// Se obtiene el valor del parámetro 'id' enviado mediante el método POST o GET
	$id=$_REQUEST['id'];

	// Se obtienen los valores de los campos del formulario enviados mediante el método POST
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$fecha = $_POST['fecha'];

	// Se construye la consulta SQL para actualizar los datos en la tabla evento
	$insertar = "UPDATE evento SET nombre='$nombre', descripcion='$descripcion', fecha='$fecha'WHERE id='$id'";

	// Se ejecuta la consulta en la base de datos
	$resultado = mysqli_query($con, $insertar);

	// Se verifica si la consulta se ejecutó correctamente
	if (!$resultado) {
		// Si ocurrió un error, se redirecciona a la página "Errorpedido.html"
		header("location:Errorpedido.html");
	} else {
		// Si la consulta se ejecutó correctamente, se redirecciona a la página "metasBuena.php"
		header("location:metasBuena.php");
	}
?>