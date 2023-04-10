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
  
?>
<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="width: 100%; margin-left: 0px;">  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown" style="text-align: right;">
        <a style="font-size: 30px;margin-right: 1em;" data-toggle="dropdown" href="#">
          <?php
            if ($imagen <> 0) {
              $infoImagen = getimagesizefromstring($imagen);
              $tipoImagen = $infoImagen['mime'];
              ?>

              <img class="rounded-circle" src="data:<?php echo $tipoImagen; ?>;base64,<?php echo base64_encode($imagen); ?>" alt="Foto de Perfil" width="6%">
              <?php
            }else{
              ?>
              <i class="fa-solid fa-user" style="color: #A158E6;"></i>
              <?php
            }
          ?>
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="perfil.php" class="dropdown-item">
            Ver Perfil
          </a>
          <div class="dropdown-divider"></div>
          <a href="index.php" class="dropdown-item">
            Cerrar Sesión
          </a>
          
        </div>
      </li>
      
    </ul>
  </nav>
<!-- /.navbar -->