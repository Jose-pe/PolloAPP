let botonporcajero = document.getElementById("botonporcajero");
let botonporfecha = document.getElementById("botonporfecha");

let buscarporcajero = document.getElementById("buscarporcajero");
let buscarporfecha = document.getElementById("buscarporfecha");
let selectcajero = document.getElementById("selectcajero");

let tablaboletas = document.getElementById("tablaboletas");
let subtitulo = document.getElementById("subtituloboleta"); 


botonporcajero.addEventListener("click", mostrarbuscarporcajero);   
botonporfecha.addEventListener("click", mostrarbuscarporfecha); 

vercajeros();
function mostrarbuscarporcajero(){

        buscarporfecha.style.display="none";
        buscarporcajero.style.display="flex"

}
function mostrarbuscarporfecha(){

        buscarporfecha.style.display = "flex";
        buscarporcajero.style.display="none"
}

selectcajero.addEventListener("change", function(){
        let iduser =  selectcajero.value;
        mostrarboletaporcajero(iduser);
        console.log("id de cajero: "+ iduser);   

});


function mostrarboletaporcajero(idcajero){
    tablaboletas.innerHTML = "";
    fetch("boletasporuser/" + idcajero)
    .then((response)=> response.json())
    .then((databoletas)=>{
       

       for (let index = 0; index < databoletas.boletas.length; index++) {
            
            tablaboletas.innerHTML += 
            "<tr>"+
            "<td>"+
            databoletas.boletas[index].id +
            "</td>"+
            "<td>"+
            databoletas.boletas[index].nro +
            "</td>"+        
            "<td>"+
            databoletas.boletas[index].fecha +
            "</td>"+
            "<td>"+
            databoletas.boletas[index].total + " S/."+
            "</td>"+
            "<td>"+
            "<button type='button' class='btn btn-success'>Ver</button>"+
            "</td>"+
            "</tr>";

           
       }

    });
}

function vercajeros(){
  
    fetch("mostrarcajeros")
    .then((response)=> response.json())
    .then((datacajeros) => {
            for (let index = 0; index < datacajeros.users.length; index++) {
                
                selectcajero.innerHTML += "<option value='"+ datacajeros.users[index].id +"'>"+ datacajeros.users[index].name +"</option>"
            }
    });
}