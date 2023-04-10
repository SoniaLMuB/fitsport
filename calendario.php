<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <?php
        include('head.php');
    ?>
    <link href="css/calendario.css" rel="stylesheet">
    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="body">
    <?php
        include('aside.php');
    ?>
    
    <h1 class="titulo">CALENDARIO</h1>
    
    <div class="calendar" id="calendar">
    <div class="left-side">
        <div class="current-day text-center">
            <h1 class="calendar-left-side-day"></h1>
            <div class="calendar-left-side-day-of-week"></div>
        </div>
        <div class="current-day-events">
            <table id="tabla-eventos" data-date=""></table>
            <!-- <ul class="current-day-events-list"></ul> -->
            

<div class="container">
  <div class="scrollable">
    <table id = "listaEventos" class="table">
    
    </table>
  </div>
</div>
        </div>
        <div>
            <br>
            <button class="btn btn-primary btn-sm" id="crear_evento" data-toggle="modal" data-target="#myModal"> 
                <span hidden class="fa fa-plus-circle cursor-pointer add-event-day-field-btn"> </span>Crear evento
            </button>
           
        </div>
    </div>
    <div class="right-side">
        <div class="text-right calendar-change-year">
            <div class="calendar-change-year-slider">
                <span class="fa fa-caret-left cursor-pointer calendar-change-year-slider-prev"></span>
                <span class="calendar-current-year"></span>
                <span class="fa fa-caret-right cursor-pointer calendar-change-year-slider-next"></span>
            </div>
        </div>
        <div class="calendar-month-list">
            <ul class="calendar-month"></ul>
        </div>
        <div class="calendar-week-list">
            <ul class="calendar-week"></ul>
        </div>
        <div class="calendar-day-list">
            <ul class="calendar-days"></ul>
        </div>
        </div>
    </div>


    <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar Nuevo Evento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
            <label for="event-name" class="control-label">Nombre del evento:</label>
            <input type="text" class="form-control" id="event-name" name="event-name">
          </div>
          <div class="form-group">
            <label for="event-description" class="control-label">Descripción del evento:</label>
            <textarea class="form-control" id="event-description" name="event-description"></textarea>
          </div>
          <div class="form-group">
            <label for="event-date" class="control-label">Fecha del evento:</label>
            <input type="date" class="form-control" id="event-date" name="event-date">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="guardar-evento">Guardar</button>
        <button hidden type="button" class="btn btn-primary" id="guardar-evento_editar">Actualizar</button>
      </div>
    </div>
  </div>
</div>


<!--Abril Archivo JS-->
<script src="js/calendario.js"></script>
</body>
</html>