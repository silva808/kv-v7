var descripciont=document.getElementById('cont_description');
var abrirdest = document.querySelectorAll('.opendes');
var closedeest=document.getElementById('close_des');
abrirdest.forEach((boton) => {
    boton.addEventListener('click', () => {
        descripcion.classList.add('dess');
    });
});

closedeest.addEventListener('click', () => {
    descripcion.classList.remove('dess');
});