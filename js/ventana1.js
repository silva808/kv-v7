window.onload=function(){

const compras= document.getElementById('abrirhisto');
const modalx= document.getElementById('historial');
const modify= document.getElementById('modificar');
const cerrarx= document.getElementById('cercompras');
const anidar= document.getElementById('crear');



const botcar=document.getElementById('carrito');
const contcar=document.getElementById('contain_carrito');
const closecar=document.getElementById('cercarrito');


compras.addEventListener('click', ()=>{
    modalx.classList.add("oon");
    modify.classList.remove("mod");
    anidar.classList.remove("show");
    
});
cerrarx.addEventListener('click', ()=>{
    modalx.classList.remove("oon");
});


botcar.addEventListener('click', ()=>{
    contcar.classList.add("visible_car");
});
closecar.addEventListener('click', ()=>{
    contcar.classList.remove("visible_car");
});
}