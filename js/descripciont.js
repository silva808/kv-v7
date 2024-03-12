
var descripcion=document.getElementById('cont_description');
var abrirdes = document.querySelectorAll('.opendes');
var closedees=document.getElementById('close_des');

abrirdes.forEach((boton) => {
    boton.addEventListener('click', () => {
        descripcion.classList.add('dess');
    });
});

closedees.addEventListener('click', () => {
    descripcion.classList.remove('dess');
});
