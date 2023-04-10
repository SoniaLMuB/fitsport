<!DOCTYPE html>
<html>
<head>
  <title>Obtener Ubicación</title>
  <script type="text/javascript">
    // Verificar si el navegador soporta la API de geolocalización
    if (navigator.geolocation) {
      // Solicitar la ubicación del usuario
      navigator.geolocation.getCurrentPosition(function(position) {
        // Obtener las coordenadas de latitud y longitud
        var latitud = position.coords.latitude;
        var longitud = position.coords.longitude;

        // Enviar las coordenadas al servidor utilizando AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "guardar_ubicacion.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=UTF-8");
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Manejar la respuesta del servidor, si es necesario
            console.log(xhr.responseText);
          }
        };
        xhr.send("latitud=" + latitud + "&longitud=" + longitud);
      }, function(error) {
        // Manejar errores, si es necesario
        console.error("Error al obtener la ubicación: " + error.message);
      });
    } else {
      // El navegador no soporta la API de geolocalización
      console.error("Geolocalización no soportada en este navegador");
    }
  </script>
</head>
<body>
  <!-- Contenido de la página -->
</body>
</html>