<?php
if (session_status() == PHP_SESSION_NONE) {
    // Iniciar la sesión
    session_start();
}
 if (is_null($_SESSION['fotografia'])) {
      $imagen=0;
  } else {
      
      $imagen = $_SESSION['fotografia'];
  }

  $con=mysqli_connect("localhost","root","","fitsport");
  //revisar conexion
  if($con==false){
    die ("Error, no hay conexion a la base de datos".mysqli_connect_error());
  }
  $sql="SELECT * FROM usuarios WHERE id_login=".$_SESSION['id'];
 
  $resultado=mysqli_query($con,$sql);
  $fila = $resultado->fetch_assoc();
  $nombre=$fila['nombre'];
  $apellido=$fila['apellido'];
  $fecha_nacimiento=$fila['fecha_nacimiento'];
  $pais=$fila['pais'];
  $telefono=$fila['telefono'];
  $correo=$fila['correo'];
  $tipo=$fila['tipo_usuario'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mi perfil</title>
  <?php
    include('head.php');
  ?>
  <link href="css/estilos-perfil.css" rel="stylesheet">
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
  <!-- Bootstrap Dropify CSS -->
  <link href="https://nubra-ui.hencework.com/vendors/dropify/dist/css/dropify.min.css" rel="stylesheet" type="text/css"/>

  <!-- CSS -->
    <link href="https://nubra-ui.hencework.com/dist/css/style.css" rel="stylesheet" type="text/css">
</head>
<body >
  <?php
    include('header.php');
    include('aside.php');
  ?>
  <h1 class="titulo">Mi perfil</h1>

  <div style="margin-left: 15%;">
    <div class="col-md-10">
      <div class="card" >
        <div class="card-body">
          <?php if($tipo=='F'){
            ?>
              <h1>Esta sección solo es permitida para usuarios Premium</h1>
              <div style="display: flex;justify-content: right">
              <a class="btn" href="perfil.php" style="border-radius: 30px; background-color: #A158E6; border: none; color: #fff; padding: 5px;width: 30%; font-size: 20px;text-align: center; cursor: pointer;">Volver</a>
            </div>
            <?php
            }else{


            ?>
             <div class="row">

               <div class="col-md-12" >
                <h1 class="titulo-not" style="text-align: center">Datos Personales</h1>
                <!-- formulario  -->

                  <form name="form1" method="post" action="modificarPerfil.php">
                    
                      <div class="dropify-circle edit-img " style="width: 100%;display: flex; justify-content: center;" >
                        <input type="file" name="foto"  id="foto" class="dropify-1" data-default-file="images/cambiar.png" style="width: 100%">
                      </div>
                      <div class="form-group" id="nombrediv">
                        <label for="nombre" style="text-align: center;">Nombre<span class="obligatorio">(*)</span></label>
                        <input type="text" class="form-control m-2 input" name="nombre"  id="nombre" placeholder="Ingrese su nombre" value="<?php echo $nombre ?>" required>
                     
                      <div class="form-group" id="descripciondiv">
                        <label for="descripcion ">Apellido:<span class="obligatorio">(*)</span></label>
                        <input type="text" class="form-control m-2 input" name="apellido"  id="apellido" placeholder="Ingrese su apellido" value="<?php echo $apellido?>" required>
                  
                      </div>
                      
                      <div class="form-group" id="fechadiv">
                        <label for="fecha_nacimiento">Fecha<span class="obligatorio">(*)</span></label>
                        <input type="date" class="form-control m-2 input" name="fecha_nacimiento"  id="fecha_nacimiento" placeholder="Seleccione una fecha de nacimiento" value="<?php echo $fecha_nacimiento ?>" required>
                      </div>

                      <div class="form-group" id="fechadiv">
                        <label for="telefono">Telefono<span class="obligatorio">(*)</span></label>
                        <input type="text" class="form-control m-2 input"  name="telefono"  id="telefono"  placeholder="Ingrese su numero de telefono" value="<?php echo $telefono ?>" required>
                      </div>

                      <div class="form-group" id="fechadiv">
                        <label for="correo">Correo Electrónico<span class="obligatorio">(*)</span></label>
                        <input type="email" class="form-control m-2 input" name="correo"  id="correo"   placeholder="Ingrese su correo" value="<?php echo $correo ?>" required>
                      </div>

                      <div class="form-group" id="fechadiv">
                        <label for="pais">País<span class="obligatorio">(*)</span></label>
                        <input type="text" class="form-control m-2 input"  name="pais"  id="pais" placeholder="Ingrese su país" value="<?php echo $pais ?>" required>
                      </div>
                    
                    <!-- apartado de botones -->
                    <div style="display: flex; justify-content: center; "> 
                        <button class="btn" href="editarPerfil.php" style="border-radius: 30px; background-color: #A158E6; border: none; color: #fff; padding: 5px;width: 30%; font-size: 20px;text-align: center; cursor: pointer;" >Guardar</button>
                    </div>
                </form>
            
                 
        </div>
        <?php 
          }
        ?>
      </div>
    </div>
</div>
        
        
    </div>
  </div> 
  <?php
    include('foot.php');
  ?>
</body>
<!-- jQuery -->
    <script src="https://nubra-ui.hencework.com/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="https://nubra-ui.hencework.com/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

      
  <!-- Dropify JavaScript -->
  <script src="https://nubra-ui.hencework.com/vendors/dropify/dist/js/dropify.min.js"></script>
  <script src="https://nubra-ui.hencework.com/dist/js/dropify-data.js"></script>

</html>
