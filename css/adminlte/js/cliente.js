// Obtener  el modal y donde se agregará el contenido del modal
const modalError = new bootstrap.Modal(document.getElementById('modal-default'));
const textoModal = document.getElementById('modaltexto');
// Obtener el boton encargado de mostrar el modal
const btnModal = document.getElementById('mostrar');

console.log("Entre")


//Obtener el campo input relacionado con el id para cambiar el color en caso de estar vacio
const nameC = document.getElementById("nombre");
const last_nameC = document.getElementById("apellidopaterno");
const maternoC = document.getElementById("apellidomaterno");
const correoC = document.getElementById("email");
const telefonoNoC= document.getElementById("telefono");
const dire= document.getElementById("direccion");
const rfcC = document.getElementById("rfc");
const cateC = document.getElementById("cate");
const formulario2= document.getElementById('form1');

 
btnModal.addEventListener('click', () => {
    //Obtener el valor ingresado en los input
    var formulario="";
    var paterno=document.form_1.apellidopaterno.value;
    var nombre=document.form_1.nombre.value;
    var materno=document.form_1.apellidomaterno.value;
    var email=document.form_1.email.value;
    var telefono=document.form_1.telefono.value;
    var direccion=document.form_1.direccion.value;
    var nrfc=document.form_1.rfc.value;
    var categiria=document.form_1.cate.value;
    //Validaciones
    if(paterno==""&&nombre ==""&&materno==""&&email==""&&telefono==""&direccion==""&&categiria==""&&nrfc==""){
        maternoC.style.borderColor="#FF0000";
        nameC.style.borderColor="#FF0000";
        correoC.style.borderColor="#FF0000";
        last_nameC.style.borderColor="#FF0000";
        telefonoNoC.style.borderColor="#FF0000";
        dire.style.borderColor="#FF0000";
        rfcC.style.borderColor="#FF0000";
        cateC.style.borderColor="#FF0000";
        textoModal.innerHTML = "Campos en blanco, ¡revise por favor!"
        modalError.show(); 
        return false;
    }
    if (paterno==""){
        last_nameC.style.borderColor="#FF0000";
        textoModal.innerHTML = "Campo vacio, Intente de Nuevo!"
        modalError.show(); 
        return false;
    }else{
        last_nameC.style.borderColor="#008000";
    }
    if (nombre ==""){
        nameC.style.borderColor="#FF0000";
        textoModal.innerHTML = "Campo vacio, Intente de Nuevo!"
        modalError.show(); 
        return false;
    }else{
        nameC.style.borderColor="#008000";
    }
    if (materno ==""){
        maternoC.style.borderColor="#FF0000";
        textoModal.innerHTML = "Campo vacio, Intente de Nuevo!"
        modalError.show(); 
        return false;
    }else{
        maternoC.style.borderColor="#008000";
    }
    if(email=="") {
        correoC.style.borderColor="#FF0000";
        email="Email invalido"
        textoModal.innerHTML = "Campo vacio, Intente de Nuevo!"
        modalError.show(); 
        return false;
    }else{
        correoC.style.borderColor="#008000";
    }
    if(telefono=="") {
        telefonoNoC.style.borderColor="#FF0000";
        email="Email invalido"
        textoModal.innerHTML = "Campo vacio, Intente de Nuevo!"
        modalError.show(); 
        return false;
    }else{
        telefonoNoC.style.borderColor="#008000";
    }
    if(direccion=="") {
        dire.style.borderColor="#FF0000";
        email="Email invalido"
        textoModal.innerHTML = "Campo vacio, Intente de Nuevo!"
        modalError.show(); 
        return false;
    }else{
        dire.style.borderColor="#008000";
    }
    if(nrfc=="") {
        rfcC.style.borderColor="#FF0000";
        email="Email invalido"
        textoModal.innerHTML = "Campo vacio, Intente de Nuevo!"
        modalError.show(); 
        return false;
    }else{
        rfcC.style.borderColor="#008000";
    }
    if(categiria=="") {
        cateC.style.borderColor="#FF0000";
        email="Email invalido"
        textoModal.innerHTML = "Campo vacio, Intente de Nuevo!"
        modalError.show(); 
        return false;
    }else{
        cateC.style.borderColor="#008000";
    }

    
    //texto del modal para la visualizacion de los datos ingresados
    textoModal.innerHTML = "Nombre: "+nombre +"\n apellido paterno: "+paterno+" Apellido materno: "+materno+"\n Correo: "+email+ "\n Telefono: "+telefono +" \nDirección: "+direccion+"\n RFC: "+nrfc+"\nCategoria: "+categiria;
    modalError.show();

    //Formulario en blanco
    formulario2.nombre.value=formulario2.apellidopaterno.value=formulario2.apellidomaterno.value=formulario2.email.value='';
    formulario2.telefono.value=formulario2.direccion.value=formulario2.rfc.value=formulario2.cate.value='';


});
