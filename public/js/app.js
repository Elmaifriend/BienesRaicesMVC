document.addEventListener("DOMContentLoaded", function(){
    
    eventListeners();
    
    darkMode();
});

function darkMode(){
    const prefiereDarkMode = window.matchMedia( "(prefers-color-scheme: dark)");
    
    agregarDarkMode( prefiereDarkMode );
    
    prefiereDarkMode.addEventListener("change", agregarDarkMode );

    const botonDarkMode = document.querySelector(".dark-mode-boton");
    botonDarkMode.addEventListener("click", function(){
        document.body.classList.toggle("dark-mode");
    });
}

function agregarDarkMode( prefiereDarkMode ){
    if( prefiereDarkMode.matches){
        document.body.classList.add("dark-mode");
    }
    else{
        document.body.classList.remove("dark-mode");
    }
}

function eventListeners(){
    const mobileMenu = document.querySelector(".mobile-menu");
    
    mobileMenu.addEventListener("click", navegacionResponsive);

    //Mostrar campos condicionales 
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach( (input) =>{
        input.addEventListener("click", mostrarFormaContacto);
    });
}

function navegacionResponsive(){
    const navegacion = document.querySelector(".navegacion");

    navegacion.classList.toggle("mostrar");
}

function mostrarFormaContacto( event ){
    const contactoDiv = document.querySelector("#contacto");

    if( event.target.value === "telefono"){
        contactoDiv.innerHTML = `
            <input type="tel" placeholder="Tu Telefono:" id="telefono" name="contacto[telefono]">
            <p>Elija la fecha y la hora para ser contactado</p>

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora</label>
            <input type="time" id="hora" name="contacto[hora]"></input>
        `;

    } else {
        contactoDiv.innerHTML = `
            <input required type="email" placeholder="Tu Email:" id="email" name="contacto[email]">
        `;
    }
}