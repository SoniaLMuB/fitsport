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
        $consulta= "SELECT id FROM usuarios WHERE id_login = '$user_id'";
        $resultado2 = mysqli_query($con, $consulta);
        if (mysqli_num_rows($resultado2) > 0) {
            $usuario = mysqli_fetch_assoc($resultado2);
            $idUsuario =  $usuario['id'];
        }
        // Ahora tienes el ID del usuario que corresponde al nombre de usuario dado
    }

   
?>

<!DOCTYPE html>
<html lang="en" style="background-color: #F3EAFA;">
<head>
    <title>Rutinas</title>
    <?php
        include('head.php');
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #F3EAFA;">
    <?php
        include('header.php');
        include('aside.php');
        include('foot.php');
    ?>
    <link rel="stylesheet" type="text/css" href="css/rutinas.css">
    <!-- Titulo de la pagina -->
    <h1 class="titulo">RUTINAS</h1>
    <!-- slogan de la pagina -->
    <h2 class="frase">La disiplina supera el talento</h2>
    <?php
       $datos = "SELECT * FROM rutinas WHERE id_usuario = '$idUsuario'";
        $resultado = mysqli_query($con, $datos);
        if (mysqli_num_rows($resultado) > 0){
        while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <div class="card Cdashboard">
      <div class="card-body CBdashboard ">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="metas">RUTINA</th>
              <th scope="col" class="metas">DEESCRIPCION</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $mostrar['nombre']; ?></td>
              <td><?php echo $mostrar['descripcion']; ?></td>
              <td>
                <a href="eliminarRutina.php?id=<?php echo $mostrar['id']; ?>" >
                  <img src="images/eliminar.png" style = "width: 50px;" alt="Botón de imagen">
                </a>
                <a href="editarRutinas.php?id=<?php echo $mostrar['id']; ?> " id="editarMeta">
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
    <div class="card Cdashboard">
        <div class="card-body CBdashboard ">
          <h1>NO TIENE RUTINAS</h1>
        </div>
      </div>
    <?php
        }      
    ?>
    <br>
     
     <!-- Boton para agregar mas metas -->
     <a href="#" class="imagen-boton" id="agregarRutina">
         <img src="images/agregar.png" alt="Botón de imagen">
     </a>
     <!-- fin boton para agregar mas metas -->
 
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
             <form name="form1" action="agregarRutina.php" method="POST">
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
         const agregarBtn = document.getElementById('agregarRutina');
         agregarBtn.addEventListener('click', (e) => {
         <?php    
             $sql2= "SELECT tipo_usuario FROM usuarios WHERE id_login = '$user_id'";
             $verificar = mysqli_query($con, $sql2);
             if (mysqli_num_rows($verificar) > 0) {
                 $tipo = mysqli_fetch_assoc($verificar);
                 $tipoUsuario = $tipo['tipo_usuario'];
             }
 
             $consulta= "SELECT * FROM rutinas WHERE id_usuario = '$idUsuario'";
             $verificar2 = mysqli_query($con, $consulta);
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
     <!-- Fin agregar nueva meta -->

</body>
</html>