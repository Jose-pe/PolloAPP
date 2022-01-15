
//console.log("aqui estamos");
//BOTONES DE PLATOS - BEBIDAS - COMPLEMENTOS
let botonplatos = document.getElementById("botonplatos");
let formplatos = document.getElementById("formplatos");

let botonbebidas = document.getElementById("botonbebidas");
let formbebidas = document.getElementById("formbebidas");

let botoncomplementos = document.getElementById("botoncomplementos");
let formcomplementos = document.getElementById("formcomplementos");

let botoncerrar = document.getElementsByClassName("btn-close");

//console.log(botoncerrar);


function mostrarplatos(){
    formplatos.style.display= "flex";
    formbebidas.style.display="none";
    formcomplementos.style.display="none";
    
    let optionplato = document.getElementById("optionplato");

    fetch('http://polloapp.in/platillosjson')
    .then(response => response.json())
    .then(data => {
        console.log(data.platillos[0]);

        optionplato.innerText = data.platillos[0].nombreplatillo + " - " + data.platillos[0].tamanio;

    });

}
function mostrarbebidas(){
    formplatos.style.display= "none";
    formbebidas.style.display="flex";
    formcomplementos.style.display="none";
}
function mostrarcomplementos(){
    formplatos.style.display= "none";
    formbebidas.style.display="none";
    formcomplementos.style.display="flex";
}
function cerrarformulario(){
    formplatos.style.display= "none";
    formbebidas.style.display="none";
    formcomplementos.style.display="none";
}


botonplatos.addEventListener("click", mostrarplatos);
botonbebidas.addEventListener("click", mostrarbebidas);
botoncomplementos.addEventListener("click", mostrarcomplementos);
botoncerrar[0].addEventListener("click", cerrarformulario);
botoncerrar[1].addEventListener("click", cerrarformulario);
botoncerrar[2].addEventListener("click", cerrarformulario);

//AGREGAR PEDIDOS

let nombreplato = document.getElementById("nombreplato");
let cantidadplato = document.getElementById("cantidadplato");
let precioplato = document.getElementById("precioplato");
let botonagregarplato = document.getElementById("botonagregarplato");

let platotabla = document.getElementById("platotabla");
let cantidadtabla= document.getElementById("cantidadtabla");
let preciotabla= document.getElementById("preciotabla");

function agregarplato(){
    
    let platoseleccionado = nombreplato.options[nombreplato.selectedIndex];
    let cantidad = cantidadplato;   
    let precio= precioplato;
    
    
    
  
    /*
    platotabla.innerText = platoseleccionado.text;
    cantidadtabla.innerText= cantidad.value;
    preciotabla.innerText= precio.text;*/
}

botonagregarplato.addEventListener("click", agregarplato);



