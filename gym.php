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
    <title>Gimnasios</title>
    <?php
        include('head.php');
    ?>
    <link rel="stylesheet" type="text/css" href="css/gym.css">
    

    <link href='https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.5.0/mapbox-gl.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Qfzp/Zvkl8gBhYnX4sf4J/XtIV+Te8W5KzZssnJSZD71zCv8TuRkMWrC9kbU6bz3U6v2+6GdZs+W1wzALPyqKQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background-color: #F3EAFA;" >
  <?php
    include('header.php');
    include('aside.php');
  ?>
  <!-- Titulo de la pagina -->
  <h1 class="titulo">GIMNASIOS ASOCIADOS</h1>
  <!-- slogan de la pagina -->
  <h2 class="frase">La disciplina supera el talento</h2>
  <?php
    // Conexión a la base de datos
    $dsn = 'mysql:host=localhost;dbname=fitsport';
    $usuario = 'root';
    $contraseña = '';

    $pdo = new PDO($dsn, $usuario, $contraseña);

    // Consulta SQL para obtener las ubicaciones
    $consulta = 'SELECT id, nombre, direccion, latitud, longitud FROM gimnasios'    ;
    $sentencia = $pdo->query($consulta);
    $ubicaciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);
  ?>
  
  <div style="display: flex; justify-content: center; align-items: center; ">
    <div id="map" style="width: 700px; height: 500px;"></div>
  </div>
  <br>

  <script>  
    mapboxgl.accessToken = 'pk.eyJ1IjoiZml0c3BvcnQiLCJhIjoiY2xnOXNudzU5MWEyNzNrbjltY2VqNXMwZSJ9.gLEUxCYBo-oatDw1L9U9IA';

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/fitsport/clg9tx97v000a01nzn5ifpvw2',
        center: [-99.1442385305958,23.737125861296683],
        zoom: 12
    });
    // Agregar control de navegación
    map.addControl(new mapboxgl.NavigationControl());

    <?php foreach ($ubicaciones as $ubicacion) { ?>
      new mapboxgl.Marker()
        .setLngLat([<?= $ubicacion['longitud'] ?>, <?= $ubicacion['latitud'] ?>])
        .addTo(map)

        .setPopup(new mapboxgl.Popup({ offset: 25 })
          .setHTML('<h3>' + '<?= $ubicacion['nombre'] ?>' + '</h3><p>' + '<?= $ubicacion['direccion'] ?>' + '</p>'))
        
          .on('click', function() {
            // Establece la ubicación como el centro del mapa y aumenta el nivel de zoom
            map.flyTo({
                center: [<?= $ubicacion['longitud'] ?>, <?= $ubicacion['latitud'] ?>],
                zoom: 18 // Agrega el nivel de zoom deseado aquí
            });
          });
    <?php } ?>
  </script>
  <?php
    // Consulta SQL para obtener las ubicaciones
    $consulta = 'SELECT id, nombre, direccion, descripcion, telefono,calificacion FROM gimnasios'    ;
    //$sentencia = $pdo->query($consulta);
    //$query = "SELECT * FROM gimnasios";
    $resultado = mysqli_query($con, $consulta);

    // Almacenar los resultados en un arreglo
    $gimnasios = array();
    while ($row = mysqli_fetch_assoc($resultado)) {
        $gimnasios[] = $row;
    }
  
    function mostrar_estrellitas($calificacion) {
    $estrellas = '';
    for ($i = 0; $i < 5; $i++) {
      
      if ($i < round($calificacion)) {

        $estrellas .= '<i class="fas fa-star"></i>'; // estrella completa
      } else {
        $estrellas .= '<i class="far fa-star"></i>'; // estrella vacía
      }
    }
    return $estrellas;
  }
  ?>
  <div class="card-container">
    <?php foreach ($gimnasios as $gimnasio): ?>
        <div class="card">
            <div class="card-header">
                <h5><?= $gimnasio['nombre'] ?></h5>
            </div>
            <div class="card-body">
                <p><strong>Dirección:</strong><br><?= $gimnasio['direccion'] ?></p>
                <p><strong>Horario:</strong><br></strong><?= $gimnasio['descripcion'] ?></p>
                <p><strong>Telefono: </strong><?= $gimnasio['telefono'] ?></p>
                
                <p><strong>Calificación:</strong> <span style="color: #fdd835"> <?php
                  $sql0="SELECT calificacion FROM opiniones WHERE id_gimnasio=".$gimnasio['id'];
                    $resultado0=mysqli_query($con,$sql0);
                    $filas=mysqli_num_rows($resultado0);
                    $promedio=0;
                    if ($filas > 0) {
                        // Iterar sobre los resultados y imprimir cada ID
                      $promedio=0;
                      while ($fila = $resultado0->fetch_assoc()) {
                        $promedio=$promedio+$fila['calificacion'];
                        
                      }
                      $promedio=$promedio/$filas;
                    }
                    ?>
                  <?=mostrar_estrellitas($promedio) ?> </span></p>
                <!-- Agregar formulario de calificación -->
                <form action="procesar_calificacion.php" method="POST">
                    <label for="calificacion">Tu opinión:</label>
                    <input type="number" name="calificacion" min="1" max="5">
                    <input type="hidden" name="gimnasio_id" value="<?= $gimnasio['id'] ?>">
                    <button type="submit" style="border-radius: 30px; background-color: #A158E6; border: none; color: #fff; padding: 10px;">Calificar</button>
                </form>
                <!-- Agregar más información del gimnasio aquí -->
            </div>
        </div>
    <?php endforeach; ?>
  </div>
    
  <?php
    include('foot.php');
  ?>
</body>
</html>
