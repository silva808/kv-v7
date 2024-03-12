const closemodiff= document.getElementById('botonmodival');
const ventanamodif= document.getElementById('modivalores');
const abrirmodif = document.querySelectorAll('.openmodif');

abrirmodif.forEach((boton) => {
    boton.addEventListener('click', () => {
        ventanamodif.classList.add('prueba');
    });
});

closemodiff.addEventListener('click', ()=>{
    ventanamodif.classList.remove("prueba");
});
/*
const ventanamodifnews= document.getElementById('modivalores');
const abrirmodifnews = document.querySelectorAll('.openmodif');

abrirmodifnews.forEach((boton) => {
    boton.addEventListener('click', () => {
        ventanamodifnews.classList.add('prueba');
    });
});

$(document).ready(function() {
    // Función que se ejecuta cuando se envía un formulario
   $('.miformm').submit(function(event) {
   event.preventDefault(); // Prevenir la acción predeterminada del envío del formulario (redireccionamiento)

   var form_id = $(this).data('form'); // Obtener el identificador único del formulario

   $.ajax({
       url: 'eliminar.php', // Ruta a tu script PHP que procesará los datos
       type: 'POST', // Método HTTP que se utilizará para enviar la solicitud
       data: $(this).serialize() + '&form_id=' + form_id, // Datos que se enviarán con la solicitud (en este caso, los datos del formulario y el identificador único)
       success: function(respuesta) {
           $('#tabel').html(respuesta); // Actualizar el contenido de la página web con la respuesta del servidor
            const ventanamodifnews= document.getElementById('modivalores');
            const abrirmodifnews = document.querySelectorAll('.openmodif');
            
            abrirmodifnews.forEach((boton) => {
                boton.addEventListener('click', () => {
                    ventanamodifnews.classList.add('prueba');
                });
            });
            },
    });
    });
});*/