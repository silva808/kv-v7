const closession= document.getElementById('contain_cerrar');
const iniciart= document.getElementById('iniciar_sesion');
const cancelclos= document.getElementById('cancel_close');
iniciart.addEventListener('click', ()=>{
    closession.classList.add("closesesion");
});
cancelclos.addEventListener('click',() =>{
    closession.classList.remove("closesesion");
});