<?php
    session_start(); // Inicia una sesión
    $con=mysqli_connect("localhost","root","","fitsport"); // Establece la conexión a la base de datos
    // Revisa si hay conexión exitosa
    if($con==false){
        die ("Error, no hay conexion a la base de datos".mysqli_connect_error());
    }
    $nombreUsuario=$_SESSION['nombre_usuario']; // Obtiene el nombre de usuario de la sesión
    $sql = "SELECT id FROM login WHERE user = '$nombreUsuario'"; // Consulta para obtener el ID del usuario
    $resultado = mysqli_query($con, $sql); // Ejecuta la consulta

    // Verifica si se encontró el registro del usuario
    if (mysqli_num_rows($resultado) > 0) {
        // Obtiene el ID del usuario del resultado de la consulta
        $fila = mysqli_fetch_assoc($resultado);
        $user_id = $fila['id']; // Asigna el ID del usuario a la variable $user_id
        $consulta= "SELECT id_evento FROM evento WHERE id_evento = '1'"; // Consulta para obtener el ID del evento
        $resultado2 = mysqli_query($con, $consulta); // Ejecuta la consulta

        // Verifica si se encontró el registro del evento
        if (mysqli_num_rows($resultado2) > 0) {
            $meta = mysqli_fetch_assoc($resultado2);
            $idevento =  $meta['id_evento']; // Asigna el ID del evento a la variable $idevento
        } else {
            $idevento=0; // Si no se encuentra el evento, asigna 0 a la variable $idevento
        }
    }
?>
<!DOCTYPE html>
<html lang="en" style="background-color: #F3EAFA;" >
<head>
    <title>Metas</title>
    <?php
        include('head.php');
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/metas.css">
</head>
<body style="background-color: #F3EAFA;" >
    <?php
        include('header.php');
        include('aside.php');
    ?>
    <!-- Titulo de la pagina -->
    <h1 class="titulo">MIS METAS</h1>
    <!-- slogan de la pagina -->
    <h2 class="frase">La disiplina supera el talento</h2>
    <?php
       $datos = "SELECT * FROM evento WHERE id_login = '$user_id' AND id_evento = '$idevento'"; // Consulta para obtener datos de la tabla 'evento'
       $resultado = mysqli_query($con, $datos); // Ejecuta la consulta
       // Verifica si se encontraron resultados
       if (mysqli_num_rows($resultado) > 0) {
           while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <!-- Card donde se muestra el contenido de la meta -->
    <div class="card Cdashboard">
      <div class="card-body CBdashboard ">
        <table class="table">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col" class="metas">meta</th>
              <th scope="col" class="metas">DESCRIPCION</th>
              <th scope="col" class="metas">FECHA</th>
              <th scope="col" class="metas">ACCION</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><label class="check-container">
                      <input type="checkbox">
                      <span class="checkmark"></span>
                  </label></td>
              <!-- se muestran los datos de la meta los cuales se optienen de la base de datos -->
              <td><?php echo $mostrar['nombre']; ?></td>
              <td><?php echo $mostrar['descripcion']; ?></td>
              <td><?php echo $mostrar['fecha']; ?></td>

              <!-- botones de eliminar y editar metas -->
              <td>
                 <!--cuando se direcciona a la pagina se manda el id de la meta seleccionada -->
                <a href="eliminarMeta.php?id=<?php echo $mostrar['id']; ?>" >
                  <img src="images/eliminar.png" style = "width: 50px;" alt="Botón de imagen">
                </a>
                <a href="editarMeta.php?id=<?php echo $mostrar['id']; ?> " id="editarMeta">
                <img src="images/editar.png" style = "width: 50px;" alt="Botón de imagen">
                </a>

              </td>
            </tr>
        </table>
      </div>
    </div>
    <?php
      }
    //Entra a este else en caso de que el usuario no tiene ingresada ninguna meta
    }else{
    ?>
    <!--muestra una card con un mensaje de que no tiene metas -->
    <div class="card Cdashboard">
        <div class="card-body CBdashboard ">
          <h1>NO TIENE METAS</h1>
        </div>
      </div>
    <?php
        }      
    ?>
     <br>
     
    <!-- Boton para agregar mas metas -->
    <a href="#" class="imagen-boton" id="agregarMetas">
		<img src="images/agregar.png" alt="Botón de imagen">
	</a>
    <!-- fin boton para agregar mas metas -->

    <!-- Modal para agregar nueva meta -->
    <div class="modal fade" id="agregarMetaModal" tabindex="-1"  aria-labelledby="agregarMetaModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" >Agregar nueva meta</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
          <center>
            <form name="form1" action="agregarmeta.php" method="POST">
              <div class="form-group" id="nombrediv">
                <label for="nombre">Nombre de la meta:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
                <div id="datosw" class="invalid-feedback">
                  Los datos son obligatorios
                </div>
              </div>
              <div class="form-group" id="descripciondiv">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                <div id="datosw" class="invalid-feedback">
                  Los datos son obligatorios
                </div>
              </div>
              <div class="form-group"id="fechadiv">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
                <div id="datosw" class="invalid-feedback">
                  Los datos son obligatorios
                </div>
              </div>
              <button  type="submit" class=" modal-btn"  id="botonEnviar">Agregar</button>
            </form>
          </center>
          </div>
        </div>
      </div>
    </div>
    <!--fin  Modal para agregar nueva meta -->
    <!--JS que valida que los campos del formulario del modal no esten vacios -->
    <script src="js/meta.js"></script>


     <!-- Modal de error -->
     <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" >
          <div class="modal-header">
            <h5 class="modal-title">Error</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <center>
              <p id="modal-content" class="fs-5">Solo puede agregar una meta<br>Si quiere agregar mas metas le recomentamos ser usuario premium!</p>
              <div style="display: flex; justify-content: right; ">
                <button type="button" class=" modal-btn" data-dismiss="modal">Regresar</button>
              </div>
            </center>
            
          </div>
        </div>
      </div>
    </div>
    <!-- Modal de error -->
    
    <!-- Agregar nueva meta -->
    <script>
      // Se obtiene el botón de agregar metas por su ID
      const agregarBtn = document.getElementById('agregarMetas');
      // Se agrega un event listener al botón de agregar metas que se ejecuta al hacer clic
      agregarBtn.addEventListener('click', (e) => {
          <?php
          // Se realiza una consulta a la base de datos para obtener el tipo de usuario
          $sql2= "SELECT tipo_usuario FROM usuarios WHERE id_login = '$user_id'";
          $verificar = mysqli_query($con, $sql2);
          // Se verifica si se obtuvieron resultados
          if (mysqli_num_rows($verificar) > 0) {
              // Se obtiene el tipo de usuario
              $tipo = mysqli_fetch_assoc($verificar);
              $tipoUsuario = $tipo['tipo_usuario'];
          }

          // Se realiza una consulta a la base de datos para verificar si el usuario tiene eventos y es de tipo F
          $consulta= "SELECT * FROM evento WHERE id_login = '$user_id' AND id_evento = '1'";
          $verificar2 = mysqli_query($con, $consulta);
          // Se verifica si se obtuvieron resultados y si el usuario es de tipo F
          if ($tipoUsuario == 'F' && mysqli_num_rows($verificar2) >= 1){
          ?>
          // Se muestra un modal con ID "myModal" utilizando Bootstrap Modal
          const myModal = new bootstrap.Modal(document.getElementById("myModal"));
          myModal.show();
          <?php
          }else{
          ?>
          // Se muestra un modal con ID "agregarMetaModal" utilizando Bootstrap Modal
          const myModal = new bootstrap.Modal(document.getElementById("agregarMetaModal"));
          myModal.show();
          <?php
          }
          ?>
      });
    </script>
    <!-- Fin agregar nueva meta -->
 
    <?php
        include('foot.php');
    ?>
</body>
</html>
