<?php
  session_start();
  // Conectar a la base de datos con los siguientes parámetros: servidor (localhost), usuario (root), contraseña (vacía) y nombre de la base de datos (fitsport)
  $con=mysqli_connect("localhost","root","","fitsport");
  // Verificar si hay error en la conexión a la base de datos
  if($con==false){
    die ("Error, no hay conexion a la base de datos".mysqli_connect_error());
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

    <h1 class="titulo">EDITAR META</h1>
    <!-- slogan de la pagina -->
    <h2 class="frase">La disiplina supera el talento</h2>
    <?php
    if (isset($_GET['id'])) { 
        // Verifica si se ha recibido el ID de la meta a mostrar
        $idMeta = $_GET['id'];
        // Consulta SQL para obtener los detalles de la meta con el ID especificado
        $consulta = "SELECT * FROM evento WHERE id = $idMeta";
        $resultado = mysqli_query($con, $consulta);
        // Verifica si se encontraron resultados en la consulta
        if (mysqli_num_rows($resultado) > 0) {
            // Obtiene los detalles de la meta en un arreglo asociativo
            $mostrar = mysqli_fetch_assoc($resultado);
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
                  <form name="form1" method="post" action="modificarMeta.php?id=<?php echo $mostrar['id']; ?>">
                    <div class="card-body">
                      <!-- apartado de modificar meta -->
                      <div class="form-group" id="nombrediv">
                        <label for="nombre" style="text-align: center;">Nombre de la meta<span class="obligatorio">(*)</span></label>
                        <input type="text" class="form-control m-2 input" name="nombre"  id="nombre" placeholder="Ingrese el nombre de la meta" aria-describedby="datosw" value="<?php echo $mostrar['nombre'] ?>" required>
                        <!-- Mensaje de dato invalido -->
                        <div id="datosw" class="invalid-feedback">
                          Los datos son obligatorios
                        </div>
                      </div>

                      <!-- apartado de modificar descripcion -->
                      <div class="form-group" id="descripciondiv">
                        <label for="descripcion ">Descripción:<span class="obligatorio">(*)</span></label>
                        <input type="text" class="form-control m-2 input" name="descripcion"  id="descripcion" placeholder="Ingrese la descripcion" aria-describedby="datosw" value="<?php echo $mostrar['descripcion'] ?>" required>
                        <!-- Mensaje de dato invalido -->
                        <div id="datosw" class="invalid-feedback">
                          Los datos son obligatorios
                          </div>
                      </div>
                      
                      <!-- apartado de modificar fecha -->
                      <div class="form-group" id="fechadiv">
                        <label for="fecha">Fecha<span class="obligatorio">(*)</span></label>
                        <input type="date" class="form-control m-2 input" name="fecha"  id="fecha" placeholder="Seleccione una fecha" aria-describedby="datosw" value="<?php echo $mostrar['fecha'] ?>" required>
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
    <!-- llama al JS donde verifica si no dejo el usuario un campo basio -->
    <script src="js/meta.js"></script>
  
</body>
</html>

  