const anexar= document.getElementById('anexar');
const modificar= document.getElementById('moddificar');
const modalelim= document.getElementById('modificar');
const modal= document.getElementById('crear');
const mantener= document.getElementById('envi');
const cerrarv= document.getElementById('cerbarra');
const cerrarelim= document.getElementById('elimpr');
const histor= document.getElementById('historial');

anexar.addEventListener('click', ()=>{
    modal.classList.add("show");
    histor.classList.remove("oon");
    modalelim.classList.remove("mod");
});
mantener.addEventListener('click', ()=>{
    modal.classList.add("show");
});
cerrarv.addEventListener('click', ()=>{
    modal.classList.remove("show");
    modal.classList.remove("show");
    location.reload();
    
});
modificar.addEventListener('click', ()=>{
    modalelim.classList.add("mod");
    histor.classList.remove("oon");
    modal.classList.remove("show");
});
cerrarelim.addEventListener('click', ()=>{
    modalelim.classList.remove("mod");
    location.reload();
    
});