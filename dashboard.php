<?php
  $con=mysqli_connect("localhost","root","","fitsport");
  session_start(); // iniciar la sesión para poder acceder a las variables de sesión
  if (!isset($_SESSION['nombre_usuario'])) { // verificar si el usuario ha iniciado sesión
    exit();
  }
  $nombreUsuario=$_SESSION['nombre_usuario'];
  $sql = "SELECT id FROM login WHERE user = '$nombreUsuario'";
  $resultado = mysqli_query($con, $sql);

  // Verifica si se encontró el registro del usuario
  if (mysqli_num_rows($resultado) > 0) {
    // Obtiene el ID del usuario del resultado de la consulta
    $fila = mysqli_fetch_assoc($resultado);
    $user_id = $fila['id'];
    $consulta= "SELECT id_evento FROM evento WHERE id_evento = '1'";
    $resultado2 = mysqli_query($con, $consulta);
    if (mysqli_num_rows($resultado2) > 0) {
        $meta = mysqli_fetch_assoc($resultado2);
        $idevento =  $meta['id_evento'];
    }else{
        $idevento=0;
    }
    $consulta= "SELECT id FROM usuarios WHERE id_login = '$user_id'";
    $resultado2 = mysqli_query($con, $consulta);
    if (mysqli_num_rows($resultado2) > 0) {
      $usuario = mysqli_fetch_assoc($resultado2);
      $idUsuario =  $usuario['id'];
    }
    // Ahora tienes el ID del usuario que corresponde al nombre de usuario dado
}

  $sql0="SELECT id FROM usuarios WHERE id_login=".$_SESSION['id'];
  $resultado0=mysqli_query($con,$sql0);
  $fila0 = $resultado0->fetch_assoc();
  $sql1="SELECT id FROM evento WHERE id_evento=2";
  $resultado1=mysqli_query($con,$sql1);
  $filas1=mysqli_num_rows($resultado1);
  if ($filas1 > 0) {
      // Iterar sobre los resultados y imprimir cada ID
      while ($fila = $resultado1->fetch_assoc()) {
      
       
      }
  } else {
      echo "No se encontraron resultados.";
  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Dashboard</title>
  <?php
    include('head.php');
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/estilos_dashboard.css">
</head>
<body class="body">
  <?php
    include('header.php');
    include('aside.php');
  ?>
  
    <!-- Titulo de la pagina -->
    <h1 class="titulo">FITSPORT</h1>
    <!-- slogan de la pagina -->
    <h2 class="frase">CONECTANDO CON TU SALUD</h2>
    <!-- Card de bienvenida  -->
    <div class="card Cdashboard">
        <div class="card-body CBdashboard ">
            <div class="columna1">
                <h5 class="card-title tarjetatitulo" >Bienvenido a <br>fitsport</h5>
                <br><br><br><br><br>
                <h1 class="card-title tarjetatitulo" style="text-align:center;">@<?php echo $_SESSION['nombre_usuario']; ?>!</h1>
            </div>
            <div class="columna2">
                <img src="images/user.png" alt="" style="width: 200px; margin-left: 300px;">
            </div>
        </div>
    </div>
    <!--fin Card de bienvenida  -->
    <br>
    <!--empieza el carusel  -->
    <div id="carouselExampleAutoplaying" class="carousel custom-carousel slide" data-bs-ride="carousel">
      <!-- imagenes de carusel  -->
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/3.png" class="d-block w-100 custom-image" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/2.png" class="d-block w-100 custom-image" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/4.png" class="d-block w-100 custom-image" alt="...">
            </div>
        </div>
        <!-- fin imagenes de carusel  -->

        <!-- botones del carusel  -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        <!--fin botones del carusel  -->
    </div>
   <!-- Main row -->
   <!--TARJETAS DE METAS  -->
    <div class="row rutmet">
          <!-- Left col -->
          <section class="col-lg-5 connectedSortable">     
            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  METAS
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <ul class="todo-list" data-widget="todo-list">
                <?php
                  $datos = "SELECT * FROM evento WHERE id_login = '$user_id' AND id_evento = '$idevento'";
                    $resultado = mysqli_query($con, $datos);
                    if (mysqli_num_rows($resultado) > 0){
                    while ($mostrar = mysqli_fetch_array($resultado)) {
                ?>
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo1" id="todoCheck1">
                      <label for="todoCheck1"></label>
                    </div>
                    <!-- todo text -->
                    <span class="text"><?php echo $mostrar['nombre']; ?></span>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <?php
                    }
                  //Entra a este else en caso de que el usuario no tiene ingresada ninguna meta
                  }else{

                  
                  ?>
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- todo text -->
                    <span class="text">NO TIENE METAS</span>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <?php
                    }
                  ?>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-primary float-right" id="agregarMetas"><i class="fas fa-plus"></i> Add item</button>
              </div>
            </div>
            <!-- /.card -->
          </section>
          <!--FIN TARJETAS METAS  -->

          <!--TARJETAS DE RUTINAS  -->
          <section class="col-lg-5 connectedSortable">     
            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  RUTINAS
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <ul class="todo-list" data-widget="todo-list">
                <?php
                  $datos = "SELECT * FROM rutinas WHERE id_usuario = '$idUsuario'";
                    $resultado = mysqli_query($con, $datos);
                    if (mysqli_num_rows($resultado) > 0){
                    while ($mostrar = mysqli_fetch_array($resultado)) {
                ?>
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- checkbox -->
                    <div  class="icheck-primary d-inline ml-2">
                      <input type="checkbox" value="" name="todo1" id="todoCheck1">
                      <label for="todoCheck1"></label>
                    </div>
                    <!-- todo text -->
                    <span class="text"><?php echo $mostrar['nombre']; ?></span>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <?php
                    }
                  //Entra a este else en caso de que el usuario no tiene ingresada ninguna meta
                  }else{

                  
                  ?>
                  <li>
                    <!-- drag handle -->
                    <span class="handle">
                      <i class="fas fa-ellipsis-v"></i>
                      <i class="fas fa-ellipsis-v"></i>
                    </span>
                    <!-- todo text -->
                    <span class="text">NO TIENE RUTINAS</span>
                    <!-- General tools such as edit or delete-->
                    <div class="tools">
                      <i class="fas fa-trash-o"></i>
                    </div>
                  </li>
                  <?php
                    }
                  ?>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-primary float-right" id="agregarRutina"><i class="fas fa-plus"></i> Add item</button>
              </div>
            </div>
            <!-- /.card -->
          </section>
  </div>

  <!-- galleria de videos  -->
  <div class="container ">
    <div class="row gallery">
      <div class="col-md-6 col-lg-4 mb-4" >
          <video class="w-100 shadow-1-strong rounded mb-4" autoplay loop muted>
              <source src="images/video5.mp4" type="video/mp4" />
          </video>
      </div>
      <div class="col-md-6 col-lg-4 mb-4">
          <video class="w-100 shadow-1-strong rounded mb-4" autoplay loop muted>
              <source src="images/video2.mp4" type="video/mp4" />
          </video>
      </div>
      <div class="col-md-6 col-lg-4 mb-4" >
          <video class="w-100 shadow-1-strong rounded mb-4" autoplay loop muted>
              <source src="images/video3.mp4" type="video/mp4" />
          </video>
      </div>
      <div class="col-md-6 col-lg-8 mb-4">
          <video class="w-100 shadow-1-strong rounded mb-4" autoplay loop muted>
              <source src="images/video4.mp4" type="video/mp4" />
          </video>
      </div>
      <div class="col-md-6 col-lg-4 mb-4">
          <video class="w-100 shadow-1-strong rounded mb-4" autoplay loop muted>
              <source src="images/video1.mp4" type="video/mp4" />
          </video>
          <video class="w-100 shadow-1-strong rounded mb-4" autoplay loop muted>
              <source src="images/video5.mp4" type="video/mp4" />
          </video>
      </div>
    </div>
    <!-- fin galleria de videos  -->
  </div>
  <!-- Modal para agregar nueva meta -->
  <div class="modal fade" id="agregarMetaModal" tabindex="-1"  aria-labelledby="agregarMetaModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Agregar nueva meta</h5>
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
    <script src="js/meta.js"></script>
    <!-- Modal de error -->
     <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModal" style="display: none;" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
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
   <script >
        const agregarBtn = document.getElementById('agregarMetas');
        agregarBtn.addEventListener('click', (e) => {
        <?php 
            // Consulta para obtener el tipo de usuario del usuario actual   
            $sql2= "SELECT tipo_usuario FROM usuarios WHERE id_login = '$user_id'";
            $verificar = mysqli_query($con, $sql2);
            if (mysqli_num_rows($verificar) > 0) {
                $tipo = mysqli_fetch_assoc($verificar);
                $tipoUsuario = $tipo['tipo_usuario'];
            }
            // Consulta para verificar si ya existe una rutina para el usuario actual
            $consulta= "SELECT * FROM evento WHERE id_login = '$user_id' AND id_evento = '1'";
            $verificar2 = mysqli_query($con, $consulta);
            if ($tipoUsuario == 'F' && mysqli_num_rows($verificar2) >= 1){
        ?>
        //si se cumple la condicion muestra el modal de error
        const myModal = new bootstrap.Modal(document.getElementById("myModal"));
        myModal.show();
        <?php    
            }else{
        ?>
        //si no se cumple la condicion muestra el modal para agregar una nueva meta
        const myModal = new bootstrap.Modal(document.getElementById("agregarMetaModal"));
        myModal.show();
        <?php    
            }
        ?>
        });
    </script>
    <!-- Modal para agregar nueva rutina -->
    <div class="modal fade" id="agregarRutinaModal" tabindex="-1"  aria-labelledby="agregarRutinaModal" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="modalTitle">Agregar nueva rutina</h5>
             <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
             </button>
           </div>
           <div class="modal-body">
           <center>
             <form name="form1" action="agregarRutinaDashboard.php" method="POST">
               <div class="form-group" id="nombrediv">
                 <label for="nombre">Nombre de la rutina:</label>
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
               <button type="submit" class=" modal-btn"  id="botonEnviar">Agregar</button>
             </form>
           </center>
           </div>
         </div>
       </div>
     </div>
     <!--fin  Modal para agregar nueva meta -->
     <script src="js/rutinas.js"></script>

    <!-- Agregar nueva rutina -->
    <script>
      const agregarRutinaBtn = document.getElementById('agregarRutina');
      agregarRutinaBtn.addEventListener('click', (e) => {
      <?php    
          // Consulta para obtener el tipo de usuario del usuario actual
          $sql2= "SELECT tipo_usuario FROM usuarios WHERE id_login = '$user_id'";
          $verificar = mysqli_query($con, $sql2);
          if (mysqli_num_rows($verificar) > 0) {
              $tipo = mysqli_fetch_assoc($verificar);
              $tipoUsuario = $tipo['tipo_usuario'];
          }

          // Consulta para verificar si ya existe una rutina para el usuario actual
          $consulta= "SELECT * FROM rutinas WHERE id_usuario = '$idUsuario'";
          $verificar2 = mysqli_query($con, $consulta);

          // Verificar si el tipo de usuario es 'F' y si ya existe una rutina
          if ($tipoUsuario == 'F' && mysqli_num_rows($verificar2) >= 1){
      ?>
      const myModal = new bootstrap.Modal(document.getElementById("myModal"));
      myModal.show();
      <?php    
          }else{
      ?>
      const myModal = new bootstrap.Modal(document.getElementById("agregarRutinaModal"));
      myModal.show();
      <?php    
          }
      ?>
      });
    </script>

  <?php
    include('foot.php');
  ?>    
</body>

</html>