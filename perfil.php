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
             <div class="row">
               <div class="col-md-5" >
                  <?php
                    if ($imagen <> 0) {
                      $infoImagen = getimagesizefromstring($imagen);
                      $tipoImagen = $infoImagen['mime'];
                      ?>

                      <img class="rounded-circle" src="data:<?php echo $tipoImagen; ?>;base64,<?php echo base64_encode($imagen); ?>" alt="Foto de Perfil" width="90%">
                      <?php
                    }else{
                      ?>
                      <img class="rounded-circle" src="images/user.png" alt="Foto de Perfil" width="90%">
                      <?php
                    }
                  ?>
               </div>
               <div class="col-md-7" >
                <h1 class="titulo-not">Datos Personales</h1>
                <p style="font-size: 23px"><strong>Nombre:</strong> <?php echo $nombre?><br>
                <strong>Apellido:</strong> <?php echo $apellido?><br>
                <strong>Fecha de Nacimiento:</strong> <?php echo $fecha_nacimiento?><br>
                <strong>Teléfono:</strong> <?php echo $telefono?><br>
                <strong>Correo electrónico: </strong><?php echo $correo?><br>
                <strong>País: </strong><?php echo $pais?><br>

                </p>
                <div style="display: flex;justify-content: right" class="row">
                  <div class="col-md-7">
                    <div style="display: flex;justify-content: right">
                      <a data-toggle="modal" data-target="#modal1" class="btn2" href="#" style="border-radius: 30px; background-color: #248BC2; border: none; color: #fff; padding: 5px;width: 100%; font-size: 20px;text-align: center; cursor: pointer;text-decoration: none">Cambiar a Premium</a>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <a class="btn" href="editarPerfil.php" style="border-radius: 30px; background-color: #A158E6; border: none; color: #fff; padding: 5px;width: 100%; font-size: 20px;text-align: center; cursor: pointer;">Editar</a>
                  </div>
                </div>
               </div>
             </div>     
        </div>
      </div>
    </div>
</div>
        
<div class="modal fade" id="modal1" tabindex="-1"  aria-labelledby="modal1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title titulo-not" style="text-align: center;font-size: 23px" id="modalTitle"><span style="font-size: 32px;">Cambiarse a Premium</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body" style="font-size: 20px; ">
            <form method="post" action="cambiarPremium.php" class="mt-4">
              <div class="form-group">
                  <label for="nombre_tarjeta">Nombre en la tarjeta:</label>
                  <input type="text" id="nombre_tarjeta" name="nombre_tarjeta" required class="form-control">
              </div>
              <div class="form-group">
                  <label for="numero_tarjeta">Número de tarjeta:</label>
                  <input type="text" id="numero_tarjeta" name="numero_tarjeta" required class="form-control">
              </div>
              <div class="form-group">
                  <label for="fecha_vencimiento">Fecha de vencimiento:</label>
                  <input type="text" id="fecha_vencimiento" name="fecha_vencimiento" required class="form-control">
              </div>
              <div class="form-group">
                  <label for="cvv">CVV:</label>
                  <input type="text" id="cvv" name="cvv" required class="form-control">
              </div>
              <div style="display: flex;justify-content: right" >
                <button class="btn" href="editarPerfil.php" style="border-radius: 30px; background-color: #A158E6; border: none; color: #fff; padding: 5px;width: 100%; font-size: 20px;text-align: center; cursor: pointer;" type="submit" >Enviar</button>
              </div>
          </form>
    
            </div>
        </div>
      </div>
    </div>
        
    </div>
  </div> 
  <?php
    include('foot.php');
  ?>
</body>
</html>
