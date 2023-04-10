<?php
	// Conexión a la base de datos
	$con=mysqli_connect("localhost","root","","fitsport");
	// Obtener el ID, nombre y descripción enviados mediante el formulario o petición
	$id=$_REQUEST['id'];
	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	// Realizar la actualización en la base de datos
	$insertar = "UPDATE rutinas SET nombre='$nombre', descripcion='$descripcion' WHERE id='$id'";
	$resultado = mysqli_query($con, $insertar);
	// Verificar si la actualización se realizó correctamente o no
	if (!$resultado) {
		header("location:Errorpedido.html"); // Redireccionar a página de error si falla la consulta
	} else {
		header("location:rutinas.php"); // Redireccionar a página de éxito si la consulta se realiza correctamente
	}
?>