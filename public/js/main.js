
//console.log("aqui estamos");

//BOTONES DE PLATOS - BEBIDAS - COMPLEMENTOS
let botonplatos = document.getElementById("botonplatos");
let formplatos = document.getElementById("formplatos");

let botonbebidas = document.getElementById("botonbebidas");
let formbebidas = document.getElementById("formbebidas");

let botoncomplementos = document.getElementById("botoncomplementos");
let formcomplementos = document.getElementById("formcomplementos");

let botoncerrar = document.getElementsByClassName("btn-close");


let botonagregarplato = document.getElementById("botonagregarplato");
let botonagregarbebida= document.getElementById("botonagregarbebida");

//console.log(botoncerrar);
function cargarbebidas() {
    let selectbebida = document.getElementById('selectbebida');
    fetch('http://polloapp.in/bebidasjson')
    .then(response => response.json())
    .then(databebidas =>{
        console.log(databebidas.bebidas);

        for (let index = 0; index <= databebidas.bebidas.length-1; index++) {
        
            selectbebida. innerHTML += '<option class="" value="'+ index +'">'+ databebidas.bebidas[index].nombrebebida+ " - " + databebidas.bebidas[index].tamanio + '</option>';
        }

        selectbebida.addEventListener("change", function() {
            let index= this.value;
            let preciobebida= document.getElementById('preciobebida');
            let idbebida= document.getElementById('idbebida');
            let cantidadbebida=document.getElementById('cantidadbebida');

            if (index=='def') {
                 botonagregarbebida.disabled=true;    
            }
            else{
                botonagregarbebida.disabled=false;
            }
            preciobebida.innerText =databebidas.bebidas[index].precio;
            idbebida.innerText = databebidas.bebidas[index].id;
            cantidadbebida.value=1;

        });



    });

  
}

function cargarplatos(){
    let selectplato = document.getElementById("selectplato");
    fetch('http://polloapp.in/platillosjson')
    .then(response => response.json())
    .then(data => {
        console.log(data.platillos);
        
        for (let index = 0; index <= data.platillos.length-1; index++) {
            selectplato.innerHTML += '<option class="optionplato" value="'+ index +'">'+ data.platillos[index].nombreplatillo + "  -  "+ data.platillos[index].tamanio +'</option>';

        }
        selectplato.addEventListener("change", function(){
            let index = this.value;
            let precioplato = document.getElementById("precioplato");
            let idplato = document.getElementById("idplato");
            let cantidadplato = document.getElementById("cantidadplato");

            
            if (index=='def') {
                botonagregarplato.disabled=true;
            }
            else
            {
                botonagregarplato.disabled=false;
            }
             precioplato.innerText = data.platillos[index].precio;   
             idplato.innerText = data.platillos[index].id;
             cantidadplato.value=1;
        
               
        });
      //  data.platillos[0].nombreplatillo + " - " + data.platillos[0].tamanio;
       
    });
}

cargarplatos();
cargarbebidas();

//logica de la interfaz - botones de platos - bebidas - complementos
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

let tablaplatos = document.getElementById("tablaplatos");
let platotabla = document.getElementById("platotabla");
let cantidadtabla= document.getElementById("cantidadtabla");
let preciotabla= document.getElementById("preciotabla");

let indextabla =0;

function borrardetallepedido(indextabla) {
    let indexpedido = document.getElementById(indextabla);         
    indexpedido.replaceWith(" ");
          console.log(indextabla);
  }
function agregarplato(){
    
    let nombreplato = document.getElementById("selectplato");
    let cantidadplato = document.getElementById("cantidadplato");
    let precioplato = document.getElementById("precioplato");
    let idplato = document.getElementById("idplato");
    let platoseleccionado = nombreplato.options[nombreplato.selectedIndex];
    let cantidad = cantidadplato.value;   
    let precio= precioplato.textContent;
    
    let subtotal = cantidad * precio;
    indextabla = indextabla + 1;

   
   

    if (cantidad <= 0 ) {
            let alertacantidad = document.getElementById("alertacantidad");
            alertacantidad.style.display="flex";
    } else {
        
        
    tablaplatos.innerHTML += "<tr id='"+ indextabla +"'>"+ 
                "<th>"+ idplato.textContent +"</td>"+
                "<td>"+ platoseleccionado.text +"</td>"+
                "<td>"+ cantidad +"</td>"+
                "<td>"+ precio +" </td>"+
                "<td>"+ subtotal+"</td>"+   
                "<td>"+
                
                "<div class='btn-group' role='group'>"+
                "<button type='button' onclick='borrardetallepedido("+ indextabla +")' class='borrardetalle btn btn-danger'>DEL</button>"+
                "</div>"+
              
        
                "</td>"+
    "</tr>";
   
    }
    
    
    
   /* platotabla.innerText += platoseleccionado.text;
    cantidadtabla.innerText += cantidad.value;
    preciotabla.textContent += precio;*/
}

botonagregarplato.addEventListener("click", agregarplato);

//AGREGAR BEBIDAS
function agregarbebida() {
    
    let nombrebebida = document.getElementById("selectbebida");
    let cantidadbebida = document.getElementById("cantidadbebida");
    let preciobebida = document.getElementById("preciobebida");
    let idbebida = document.getElementById("idbebida");

    let bebidaseleccionada = nombrebebida.options[nombrebebida.selectedIndex];
    let cantidad = cantidadbebida.value;
    let precio = preciobebida.textContent;

    let subtotal = cantidad * precio;
    indextabla = indextabla + 1;

    if (cantidad <= 0 ) {
        
    }
    else{

        tablaplatos.innerHTML +=  "<tr id='"+ indextabla +"'>"+ 
                    "<th>"+ idbebida.textContent +"</td>"+
                    "<td>"+ bebidaseleccionada.text +"</td>"+
                    "<td>"+ cantidad +"</td>"+
                    "<td>"+ precio +" </td>"+
                    "<td>"+ subtotal+"</td>"+   
                    "<td>"+
        
                    "<div class='btn-group' role='group'>"+
                    "<button type='button' onclick='borrardetallepedido("+ indextabla +")' class='borrardetalle btn btn-danger'>DEL</button>"+
                    "</div>"+     

                   "</td>"+
            "</tr>";
    }

}

botonagregarbebida.addEventListener("click", agregarbebida);



