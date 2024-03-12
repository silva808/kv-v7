const iniciars= document.getElementById('iniciar_sesion');
const formlogin= document.getElementById('contain_login');
const botreg= document.getElementById('envireg');
const openreg= document.getElementById('contain_registro');
const closereg= document.getElementById('botreg');
const closelog= document.getElementById('closelog');
const butonclosereg=document.getElementById('closeregister');



iniciars.addEventListener('click', ()=>{
    formlogin.classList.add("sesi");  
});

botreg.addEventListener('click', ()=>{
    openreg.classList.add("reg");    
});
closereg.addEventListener('click', ()=>{
    openreg.classList.remove("reg");    
});
butonclosereg.addEventListener('click', ()=>{
    openreg.classList.remove("reg");    
});
closelog.addEventListener('click', ()=>{
    formlogin.classList.remove("sesi");    
});

