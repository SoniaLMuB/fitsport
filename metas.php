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
    // Ahora tienes el ID del usuario que corresponde al nombre de usuario dado
} else {
    // Si no se encuentra el registro del usuario, maneja el error aquí
}
?>
<!DOCTYPE html>
<html lang="en" style="background-color: #F3EAFA;" >
<head>
    <title>Metas</title>
    <?php
        include('head.php');
    ?>
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
    $datos="SELECT * FROM evento WHERE id_usuarios = $user_id";
    $resultado = mysqli_query($con, $datos);
    if (mysqli_num_rows($resultado) > 0){
      while ($mostrar = mysqli_fetch_array($resultado)) {
  ?>
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
              <td><?php echo $mostrar['nombre_evento']; ?></td>
              <td><?php echo $mostrar['descripcion']; ?></td>
              <td><?php echo $mostrar['fecha']; ?></td>
              <td>
                <a href="eliminarMeta.php?id=<?php echo $mostrar['id']; ?>" class="botones">
                  <img src="images/eliminar.png" style = "width: 50px;" alt="Botón de imagen">
                </a>
                <a href="" class="botones" data-toggle="modal" data-target="#editarMetaModal">
                  <img src="images/editar.png" style = "width: 50px;" alt="Botón de imagen">
                </a>

              </td>
            </tr>
        </table>
      </div>
    </div>
    <?php
      }
    }else{
    ?>
      <div class="card Cdashboard">
        <div class="card-body CBdashboard ">
          <h1>NO TIENE METAS</h1>
        </div>
      </div>
      <?php
    }      
    ?>

    <br>
    <a href="#" class="imagen-boton" data-toggle="modal" data-target="#agregarMetaModal">
		  <img src="images/agregar.png" alt="Botón de imagen">
	  </a>

    <!-- Modal para agregar nueva meta -->
    <div class="modal fade" id="agregarMetaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar nueva meta</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <form action="agregarMeta.php" method="POST">
              <div class="form-group">
                <label for="nombre">Nombre de la meta:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
              </div>
              <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" required>
              </div>
              <button href="modificarMeta.php?id=<?php echo $mostrar['id']; ?>" type="submit" class="btn btn-primary" >Agregar</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <?php
    $datos="SELECT * FROM evento WHERE id_usuarios = $user_id";
    $resultado = mysqli_query($con, $datos);
      while ($mostrar = mysqli_fetch_array($resultado)) {
  ?>
    <!-- Modal para editar meta -->
    <div class="modal fade" id="editarMetaModal" tabindex="-1" role="dialog" aria-labelledby="editarMetaModal" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editarMetaModal">Modificar meta</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <form action="modificarMeta.php" method="POST">
              <div class="form-group">
                <label for="nombre">Nombre de la meta:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $mostrar['nombre_evento']?>" required>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?php echo $mostrar['descripcion']?></textarea>
              </div>
              <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $mostrar['fecha']?>" required >
              </div>
              <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php
      }
    ?>
  <?php
    include('foot.php');
  ?>
    
    
</body>
</html>
