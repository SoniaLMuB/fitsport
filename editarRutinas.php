<?php
  session_start(); // Inicia la sesión
  $con=mysqli_connect("localhost","root","","fitsport"); // Conexión a la base de datos
  // Revisar la conexión a la base de datos
  if($con==false){
      die ("Error, no hay conexión a la base de datos".mysqli_connect_error()); // Muestra un mensaje de error si no se pudo establecer la conexión a la base de datos
  }

?>
<!DOCTYPE html>
<html lang="en" style="background-color: #F3EAFA;">
<head>
  <title>Editar Metas</title>
  <?php
    include('head.php');
  ?>
  <link rel="stylesheet" type="text/css" href="css/metas.css">
</head>
<body style="background-color: #F3EAFA;">
  <?php
        include('header.php');
        include('aside.php');   
    ?>

    <h1 class="titulo">EDITAR RUTINA</h1>
    <!-- slogan de la pagina -->
    <h2 class="frase">La disiplina supera el talento</h2>
    <?php
    if (isset($_GET['id'])) { // Verifica si se recibió un parámetro "id" a través del método GET
      $idRutina = $_GET['id']; // Obtiene el valor del parámetro "id" y lo asigna a la variable $idRutina
      $consulta = "SELECT * FROM rutinas WHERE id = $idRutina"; // Consulta SQL para obtener los datos de la rutina con el ID especificado
      $resultado = mysqli_query($con, $consulta); // Ejecuta la consulta en la base de datos
      if (mysqli_num_rows($resultado) > 0) { // Verifica si se encontraron resultados en la consulta
          $mostrar = mysqli_fetch_assoc($resultado); // Obtiene los datos de la rutina y los asigna a la variable $mostrar
      ?>
    ?>

    <!-- formulario  -->
    <div class="wrapper">
        <!-- Main content -->
          <div class="container-fluid">
            <div class="row" style="display: flex; justify-content: center; align-items: center;">
              <!-- col-md-6 -->
              <div class="col-md-6" >
                <!-- general form elements -->
                <div class="card card-primary">
                  <!-- /.card-header -->
                  
                  <!-- form start -->
                  <form name="form1" method="post" action="modificarRutina.php?id=<?php echo $mostrar['id']; ?>">
                    <div class="card-body">
                      <!-- apartado de Ingresar nombre -->
                      <div class="form-group" id="nombrediv">
                        <label for="nombre" style="text-align: center;">Nombre de la rutina<span class="obligatorio">(*)</span></label>
                        <input type="text" class="form-control m-2 input" name="nombre"  id="nombre" placeholder="Ingrese el nombre de la rutina" aria-describedby="datosw" value="<?php echo $mostrar['nombre'] ?>" required>
                        <!-- Mensaje de dato invalido -->
                        <div id="datosw" class="invalid-feedback">
                          Los datos son obligatorios
                        </div>
                      </div>

                      <!-- apartado de Ingresar descripcion -->
                      <div class="form-group" id="descripciondiv">
                        <label for="descripcion ">Descripción:<span class="obligatorio">(*)</span></label>
                        <input type="text" class="form-control m-2 input" name="descripcion"  id="descripcion" placeholder="Ingrese la descripcion" aria-describedby="datosw" value="<?php echo $mostrar['descripcion'] ?>" required>
                        <!-- Mensaje de dato invalido -->
                        <div id="datosw" class="invalid-feedback">
                          Los datos son obligatorios
                          </div>
                      </div>
                    <!-- apartado de botones -->
                    <div style="display: flex; justify-content: center; "> 
                        <button type="submit" id="botonEnviar" class="btn btn-primary botonForm" >Editar</button>
                    </div>
                </form>
                <!-- se acaba el formulario -->

                </div>
                <!-- /.card -->
              </div>
            </div>
          </div>
        </div>
    <!-- ./wrapper -->
    <?php
      }
    }
    ?>
    <!-- verifica que en el formulario no se quede ningun campo sin llenar -->
    <script src="js/rutinas.js"></script>
  
</body>
</html>

  