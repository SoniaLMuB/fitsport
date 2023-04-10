$(document).ready(function(){
    $('#myModal').on('shown.bs.modal', function () {
        
    });

    $('#guardar-evento').click(function() {
        $('#myModalLabel').html("Crear Nuevo Evento");
        validar_modal();
      });

      $('#guardar-evento_editar').click(function() {
        
      });

    $('#crear_evento').click(function() {
        $('#myModalLabel').html("Crear Nuevo Evento");
        $('#guardar-evento_editar').hide();
        $('#guardar-evento').removeAttr("hidden");
        $('#guardar-evento').show();
    });
});

function validar_modal(){
    var nombreEvento = $('#event-name').val();
    var descripcionEvento = $('#event-description').val();
    var fechaEvento = $('#event-date').val();
    
    // Hacer algo con los datos, por ejemplo:
    //alert('Has guardado el evento: ' + nombreEvento + ', ' + descripcionEvento + ', ' + fechaEvento);
    mandar_datos(nombreEvento,descripcionEvento,fechaEvento);
}

function convertirFecha(fecha) {
    // Separa los elementos de la fecha usando el separador "/"
    var elementosFecha = fecha.split("/");
    
    // Crea una nueva fecha en formato ISO yyyy-mm-dd
    var nuevaFecha = new Date(elementosFecha[2], elementosFecha[1], elementosFecha[0]).toISOString().slice(0,10);
    
    return nuevaFecha;
}

function mandar_datos(nombreEvento,descripcionEvento,fechaEvento){
    const datos = {
        name: nombreEvento,
        description: descripcionEvento,
        date: fechaEvento
      };

    console.log(datos);
    
    $.ajax({
      url: "agregarevento.php",
      method: "POST",
      data: datos,
      success: function(respuesta) {
        // Manejar la respuesta del servidor
        console.log(respuesta);

        Swal.fire({
          icon: 'success',
          title: 'Evento Registrado',
        })
        limpiarFormulario();

      },
      error: function(xhr, status, error) {
        // Manejar los errores de la petición
        console.error(error);

        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Error en la Base de Datos. Intente de nuevo',
        })
      }
    });
}

function limpiarFormulario() {
    $('#event-name').val('');
    $('#event-description').val('');
    $('#event-date').val('');
  }

  function tabla(data) {
    console.log(data[0].nombre);
    $('#listaEventos').html('');

    var html_tabla = "";
    html_tabla+= "<thead>";
    html_tabla+= "<tr>";
    //html_tabla+= "  <th>ID</th>";
    html_tabla+= "  <th>Nombre</th>";
    html_tabla+= "  <th>Ver</th>";
    html_tabla+= "  <th>Editar</th>";
    html_tabla+= "  <th>Borrar</th>";
    html_tabla+= "</tr>"
    html_tabla+= "</thead>";

    for(let i = 0; i <data.length; i++) {
        html_tabla+= "<tbody>";
        html_tabla+= "<tr>";
        //html_tabla+= "  <td>"+ data[i].id+"</td>";
        html_tabla+= "  <td>"+ data[i].nombre+"</td>";
        html_tabla+= "  <td>"+ "<button type='button' class='btn btn-outline-light' onclick='ver_modal("+data[i].id+");' data-toggle='modal' data-target='#myModal'>  <i class='fas fa-eye'></i></button>"   +"</td>";
        html_tabla+= "  <td>"+ "<button type='button' class='btn btn-outline-light' onclick='editar_modal("+data[i].id+");' data-toggle='modal' data-target='#myModal'>  <i class='fas fa-edit'></i></button>"   +"</td>";
        html_tabla+= "  <td>"+ "<button type='button' class='btn btn-outline-light' onclick='borrar_modal("+data[i].id+");'>  <i class='fas fa-trash'></i></button>"   +"</td>";
        html_tabla+= "</tr>"
        html_tabla+= "</tbody>";
    }
    
    $('#listaEventos').html(html_tabla);
  }

function ver_modal(id){
   //console.log("ver");
   $('#myModalLabel').html("Ver Evento");

   $.ajax({
    url: 'obtener_evento.php',
    type: 'GET',
    data: { id: id },
    dataType: 'json',
    success: function(data) {
      // Mostrar los eventos obtenidos
      console.log(data);
      $('#event-name').val(data[0].nombre);
      $('#event-description').val(data[0].descripcion);
      $('#event-date').val(data[0].fecha);
      $('#guardar-evento').prop("disabled", true);
      
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log('Error al obtener los eventos: ' + errorThrown);
    }
  });
}

function editar_modal(id){
   //console.log("editar");
   $('#guardar-evento').hide();
   $('#guardar-evento_editar').removeAttr("hidden");
   $('#guardar-evento_editar').show();
   $('#myModalLabel').html("Editar Evento");
   
   $.ajax({
    url: 'obtener_evento.php',
    type: 'GET',
    data: { id: id },
    dataType: 'json',
    success: function(data) {
      // Mostrar los eventos obtenidos
      console.log(data);
      $('#event-name').val(data[0].nombre);
      $('#event-description').val(data[0].descripcion);
      $('#event-date').val(data[0].fecha);
      $('#guardar-evento').prop("disabled", false);
      
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.log('Error al obtener los eventos: ' + errorThrown);
    }
  });
}

function editar_datos(id){
    var nombreEvento = $('#event-name').val();
    var descripcionEvento = $('#event-description').val();
    var fechaEvento = $('#event-date').val();

    const datos = {
        id : id,
        name: nombreEvento,
        description: descripcionEvento,
        date: fechaEvento
      };

    console.log(datos);
    
    $.ajax({
      url: "modificar_evento.php",
      method: "POST",
      data: datos,
      success: function(respuesta) {
        // Manejar la respuesta del servidor
        console.log(respuesta);

        Swal.fire({
          icon: 'success',
          title: 'Evento Modificado',
        })
        limpiarFormulario();

      },
      error: function(xhr, status, error) {
        // Manejar los errores de la petición
        console.error(error);

        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Error en la Base de Datos. Intente de nuevo',
        })
      }
    });

}

function borrar_modal(id){
    console.log("borrar");
}

const AVAILABLE_WEEK_DAYS = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
const localStorageName = 'calendar-events';

//localStorage.clear();

class CALENDAR {
    constructor(options) {
        this.options = options;
        this.elements = {
            days: this.getFirstElementInsideIdByClassName('calendar-days'),
            week: this.getFirstElementInsideIdByClassName('calendar-week'),
            month: this.getFirstElementInsideIdByClassName('calendar-month'),
            year: this.getFirstElementInsideIdByClassName('calendar-current-year'),
            eventList: this.getFirstElementInsideIdByClassName('current-day-events-list'),
            eventField: this.getFirstElementInsideIdByClassName('add-event-day-field'),
            eventAddBtn: this.getFirstElementInsideIdByClassName('add-event-day-field-btn'),
            currentDay: this.getFirstElementInsideIdByClassName('calendar-left-side-day'),
            currentWeekDay: this.getFirstElementInsideIdByClassName('calendar-left-side-day-of-week'),
            prevYear: this.getFirstElementInsideIdByClassName('calendar-change-year-slider-prev'),
            nextYear: this.getFirstElementInsideIdByClassName('calendar-change-year-slider-next')
        };

        this.eventList = JSON.parse(localStorage.getItem(localStorageName)) || {};

        this.date = +new Date();
        this.options.maxDays = 37;
        this.init();
    }

// App methods
    init() {
        if (!this.options.id) return false;
        this.eventsTrigger();
        this.drawAll();
    }

    // draw Methods
    drawAll() {
        this.drawWeekDays();
        this.drawMonths();
        this.drawDays();
        this.drawYearAndCurrentDay();
        this.drawEvents();

    }

    drawEvents() {
        let calendar = this.getCalendar();
        var fechaSeleccionada = convertirFecha(calendar.active.formatted);
        
        console.log("dias: ", fechaSeleccionada);

        //consulta sql para sacar los eventos del día
        $.ajax({
            url: 'obtener_eventos.php',
            type: 'GET',
            data: { fecha: fechaSeleccionada },
            dataType: 'json',
            success: function(data) {
              // Mostrar los eventos obtenidos
              
              //console.log(data);
              

              //var html = "<thead><tr><td>Nombre</td><td>Ver</td><td>Editar</td><td>Borrar</td></tr></thead>";
              
              if (data.length > 0) {
                tabla(data);

                /*
                $.each(data, function(index, evento) {
                 /*var  html = '<tr>';
                  html += '<td>' + evento.nombre + '</td>';
                  //html += '<td>' + evento.descripcion + '</td';
                  html += '</tr';*/
                  //$('#listaEventos tbody').append(html);
                  //$('#listaEventos tbody').append('<tr><td>Nombre de prueba</td><td>Apellido de prueba</td> <td>Edad de prueba</td></tr>');
                //}); */

               
              } else {
                $('#listaEventos').html('<p>No hay eventos programados para este día.</p>');
              }
              


            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log('Error al obtener los eventos: ' + errorThrown);
            }
          });


        
    }



    drawYearAndCurrentDay() {
        let calendar = this.getCalendar();
        this.elements.year.innerHTML = calendar.active.year;
        this.elements.currentDay.innerHTML = calendar.active.day;
        this.elements.currentWeekDay.innerHTML = AVAILABLE_WEEK_DAYS[calendar.active.week];
    }

    drawDays() {
        let calendar = this.getCalendar();

        let latestDaysInPrevMonth = this.range(calendar.active.startWeek).map((day, idx) => {
            return {
                dayNumber: this.countOfDaysInMonth(calendar.pMonth) - idx,
                month: new Date(calendar.pMonth).getMonth(),
                year: new Date(calendar.pMonth).getFullYear(),
                currentMonth: false
            }
        }).reverse();


        let daysInActiveMonth = this.range(calendar.active.days).map((day, idx) => {
            let dayNumber = idx + 1;
            let today = new Date();
            return {
                dayNumber,
                today: today.getDate() === dayNumber && today.getFullYear() === calendar.active.year && today.getMonth() === calendar.active.month,
                month: calendar.active.month,
                year: calendar.active.year,
                selected: calendar.active.day === dayNumber,
                currentMonth: true
            }
        });


        let countOfDays = this.options.maxDays - (latestDaysInPrevMonth.length + daysInActiveMonth.length);
        let daysInNextMonth = this.range(countOfDays).map((day, idx) => {
            return {
                dayNumber: idx + 1,
                month: new Date(calendar.nMonth).getMonth(),
                year: new Date(calendar.nMonth).getFullYear(),
                currentMonth: false
            }
        });

        let days = [...latestDaysInPrevMonth, ...daysInActiveMonth, ...daysInNextMonth];

        days = days.map(day => {
            let newDayParams = day;
            let formatted = this.getFormattedDate(new Date(`${Number(day.month) + 1}/${day.dayNumber}/${day.year}`));
            newDayParams.hasEvent = this.eventList[formatted];
            return newDayParams;
        });

        let daysTemplate = "";
        days.forEach(day => {
            daysTemplate += `<li class="${day.currentMonth ? '' : 'another-month'}${day.today ? ' active-day ' : ''}${day.selected ? 'selected-day' : ''}${day.hasEvent ? ' event-day' : ''}" data-day="${day.dayNumber}" data-month="${day.month}" data-year="${day.year}"></li>`
        });

        this.elements.days.innerHTML = daysTemplate;
    }

    drawMonths() {
        let availableMonths = ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dec"];
        let monthTemplate = "";
        let calendar = this.getCalendar();
        availableMonths.forEach((month, idx) => {
            monthTemplate += `<li class="${idx === calendar.active.month ? 'active' : ''}" data-month="${idx}">${month}</li>`
        });

        this.elements.month.innerHTML = monthTemplate;
    }

    drawWeekDays() {
        let weekTemplate = "";
        AVAILABLE_WEEK_DAYS.forEach(week => {
            weekTemplate += `<li>${week.slice(0, 3)}</li>`
        });

        this.elements.week.innerHTML = weekTemplate;
    }

    // Service methods
    eventsTrigger() {
        this.elements.prevYear.addEventListener('click', e => {
            let calendar = this.getCalendar();
            this.updateTime(calendar.pYear);
            this.drawAll()
        });

        this.elements.nextYear.addEventListener('click', e => {
            let calendar = this.getCalendar();
            this.updateTime(calendar.nYear);
            this.drawAll()
        });

        this.elements.month.addEventListener('click', e => {
            let calendar = this.getCalendar();
            let month = e.srcElement.getAttribute('data-month');
            if (!month || calendar.active.month == month) return false;

            let newMonth = new Date(calendar.active.tm).setMonth(month);
            this.updateTime(newMonth);
            this.drawAll()
        });


        this.elements.days.addEventListener('click', e => {
            let element = e.srcElement;
            let day = element.getAttribute('data-day');
            let month = element.getAttribute('data-month');
            let year = element.getAttribute('data-year');
            if (!day) return false;
            let strDate = `${Number(month) + 1}/${day}/${year}`;
            this.updateTime(strDate);
            this.drawAll()
        });


        this.elements.eventAddBtn.addEventListener('click', e => {
            let fieldValue = this.elements.eventField.value;
            if (!fieldValue) return false;
            let dateFormatted = this.getFormattedDate(new Date(this.date));
            if (!this.eventList[dateFormatted]) this.eventList[dateFormatted] = [];
            this.eventList[dateFormatted].push(fieldValue);
            localStorage.setItem(localStorageName, JSON.stringify(this.eventList));
            this.elements.eventField.value = '';
            this.drawAll()
        });


    }

    updateTime(time) {
        this.date = +new Date(time);
    }

    getCalendar() {
        let time = new Date(this.date);

        return {
            active: {
                days: this.countOfDaysInMonth(time),
                startWeek: this.getStartedDayOfWeekByTime(time),
                day: time.getDate(),
                week: time.getDay(),
                month: time.getMonth(),
                year: time.getFullYear(),
                formatted: this.getFormattedDate(time),
                tm: +time
            },
            pMonth: new Date(time.getFullYear(), time.getMonth() - 1, 1),
            nMonth: new Date(time.getFullYear(), time.getMonth() + 1, 1),
            pYear: new Date(new Date(time).getFullYear() - 1, 0, 1),
            nYear: new Date(new Date(time).getFullYear() + 1, 0, 1)
        }
    }

    countOfDaysInMonth(time) {
        let date = this.getMonthAndYear(time);
        return new Date(date.year, date.month + 1, 0).getDate();
    }

    getStartedDayOfWeekByTime(time) {
        let date = this.getMonthAndYear(time);
        return new Date(date.year, date.month, 1).getDay();
    }

    getMonthAndYear(time) {
        let date = new Date(time);
        return {
            year: date.getFullYear(),
            month: date.getMonth()
        }
    }

    getFormattedDate(date) {
        return `${date.getDate()}/${date.getMonth()}/${date.getFullYear()}`;
    }

    range(number) {
        return new Array(number).fill().map((e, i) => i);
    }

    getFirstElementInsideIdByClassName(className) {
        return document.getElementById(this.options.id).getElementsByClassName(className)[0];
    }
}


(function () {
    new CALENDAR({
        id: "calendar"
    })
})();