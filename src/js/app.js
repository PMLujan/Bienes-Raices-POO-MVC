document.addEventListener('DOMContentLoaded', function (){
   iniciarApp();
   darkmode();
});

function darkmode(){
   const prefiereModeDark=window.matchMedia('(prefers-color-scheme: dark)');//si tiene activado modo oscuro en el sistema operativo 
          if(prefiereModeDark.matches){
            document.body.classList.add('dark-mode');
          }else{
            document.body.classList.remove('dark-mode');
         }
   prefiereModeDark.addEventListener('change',function(){// cambia automaticamente sgun sistema operativo sin actualizar pagina
         if(prefiereModeDark.matches){
            document.body.classList.add('dark-mode');
          }else{
            document.body.classList.remove('dark-mode');
         }
   })
   const darkBoton= document.querySelector('.dark-mode-boton');
         darkBoton.addEventListener('click', function(){
         document.body.classList.toggle('dark-mode');
         });
}

function iniciarApp(){
    const menuHamburguesa=document.querySelector('.menu-hamburguesa');
          menuHamburguesa.addEventListener('click',menuResponsive);
}
 function menuResponsive(){
    const navegacion=document.querySelector('.navegacion');
          navegacion.classList.toggle('mostrar');
 }

 //mostrar metodo de contacto

 const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
       metodoContacto.forEach( input => input.addEventListener('click' , mostrarMetodoContacto));//para no realizar un id por cada elemento lo itero con un foreach

function mostrarMetodoContacto(e){
   const tipoDeContacto= document.querySelector('#contacto');
         if(e.target.value === 'telefono'){
            tipoDeContacto.innerHTML= `
            <label for="telefono">Dejanos tu numero de contacto</label>
            <input type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]">

            <label for="fecha">Fecha</label>
            <input type="date"  id="fecha" name="contacto[fecha]" requiered>
         
            <label for="hora">Hora</label>
            <input type="time"  id="hora" min="9:00" max="18:00" name="contacto[hora]" requiered>
            `;
         }else{
            tipoDeContacto.innerHTML= `
            <label for="email">Dejanos tu E-mail</label>
            <input type="email" placeholder="Tu E-mail" id="email" name="contacto[email]" required requiered>
            `;
         }
         
   // console.log(e);
}
