
console.log("aqui estamos");
let botonplatos = document.getElementById("botonplatos");
let formplatos = document.getElementById("formplatos");

let botonbebidas = document.getElementById("botonbebidas");
let formbebidas = document.getElementById("formbebidas");

let botoncomplementos = document.getElementById("botoncomplementos");
let formcomplementos = document.getElementById("formcomplementos");

function mostrarplatos(){
    formplatos.style.display= "flex";
    formbebidas.style.display="none";
    formcomplementos.style.display="none";
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
botonplatos.addEventListener("click", mostrarplatos);
botonbebidas.addEventListener("click", mostrarbebidas);
botoncomplementos.addEventListener("click", mostrarcomplementos);
