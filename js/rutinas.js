//Se obtiene la referencia al boton que muestra el modal
var btnMostrarModal = document.getElementById('botonEnviar');


// Obtener una los div de los input
var divNombre = document.getElementById('nombrediv');
var divDescripcion = document.getElementById('descripciondiv');
var divFecha = document.getElementById('fechadiv');
var formulario= document.getElementById('form1');

// Se agregan con un evento click al botón que muestra el modal
btnMostrarModal.addEventListener('click', () => {
    var nombre=document.form1.nombre.value;
    var descripcion=document.form1.descripcion.value;

    //validaciones
    if(nombre=="" ){
        divNombre.classList.add('was-validated');
        return false;
    }
    //validaciones
    if(descripcion==""){
        divDescripcion.classList.add('was-validated');
        return false;
    } 

    //reiniciar formulario
    divNombre.classList.remove('was-validated');
    divDescripcion.classList.remove('was-validated');
    //formulario.codigo.value=formulario.nombre.value=formulario.categoria.value=formulario.precioVen.value=formulario.preciocom.value='';
    });
