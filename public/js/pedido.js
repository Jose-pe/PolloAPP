//console.log("aqui estamos");

//BOTONES DE PLATOS - BEBIDAS - COMPLEMENTOS
let botonplatos = document.getElementById("botonplatos");
let formplatos = document.getElementById("formplatos");

let botonbebidas = document.getElementById("botonbebidas");
let formbebidas = document.getElementById("formbebidas");

let botoncomplementos = document.getElementById("botoncomplementos");
let formcomplementos = document.getElementById("formcomplementos");

let botoncerrar = document.getElementsByClassName("botoncerrar");
let botoncerraralerta = document.getElementsByClassName("botoncerraralerta");

let botonagregarplato = document.getElementById("botonagregarplato");
let botonagregarbebida = document.getElementById("botonagregarbebida");
let botonagregarcomplemento = document.getElementById("botonagregarcomplemento");

let botonatendermesa = document.getElementById("botonatendermesa");
let botoncancelarpedido = document.getElementById("botoncancelarpedido");
let botonverpedido = document.getElementById("botonverpedido");
let botonatendido = document.getElementById("botonatendido");

let botonconfirmarpedido = document.getElementById("botonconfirmarpedido");
let idpedido = document.getElementById("idpedido");
let verificador = document.getElementsByClassName("subtotal");
let listapedidos =document.getElementsByClassName("listapedidos");

let botonaumentarpedido= document.getElementById("botonaumentarpedido");

let botonaumentarplato = document.getElementById("botonaumentarplato");
let botonaumentarbebida= document.getElementById("botonaumentarbebida");
let botonaumentarcomplemento = document.getElementById("botonaumentarcomplemento");

let idusuario = document.getElementById("idusuario");

//detectar si el usuario abandona la pagina de abandonarla se borra el pedido inconcluso
    window.addEventListener("beforeunload", function (e) {
            let totalapagar = this.document.getElementById('totalapagar');   
          if (idpedido.textContent == "") {
              
          } else {
            if (totalapagar.textContent > 0) {
                    
            } else {
             borraratencion();
             let mensaje = "Esta seguro de Salir?";
             e.returnValue = mensaje;  
             return mensaje; 
             /*
             if (verificador.length > 0) {
                 let mensaje = "Esta seguro de Salir?";
    
                 e.returnValue = mensaje;  
                 borraratencion();   
                 return mensaje; 
             } else {
             }
               */  
             }
          }  
         
            
               
    });    


//console.log(botoncerrar);
function cargarcomplementos() {
    let selectcomplemento = document.getElementById("selectcomplemento");
    fetch("/complementosjson")
        .then((response) => response.json())
        .then((datacomplementos) => {
            console.log(datacomplementos.complementos);
            for (
                let index = 0;
                index <= datacomplementos.complementos.length - 1;
                index++
            ) {
                selectcomplemento.innerHTML +=
                    '<option class="" value="' +
                    index +
                    '">' +
                    datacomplementos.complementos[index].nombrecomplemento +
                    " - " +
                    datacomplementos.complementos[index].tamanio +
                    "</option>";
            }
            selectcomplemento.addEventListener("change", function () {
                let index = this.value;
                let preciocomplemento =
                    document.getElementById("preciocomplemento");
                let idcomplemento = document.getElementById("idcomplemento");
                let cantidadcomplemento = document.getElementById(
                    "cantidadcomplemento"
                );

                if (index == "def") {
                    botonagregarcomplemento.disabled = true;
                    botonaumentarcomplemento.disabled=true;
                } else {
                    botonagregarcomplemento.disabled = false;
                    botonaumentarcomplemento.disabled= false;
                }
                preciocomplemento.innerText =
                    datacomplementos.complementos[index].precio;
                idcomplemento.innerText =
                    datacomplementos.complementos[index].id;
                cantidadcomplemento.value = 1;
            });
        });
}

function cargarbebidas() {
    let selectbebida = document.getElementById("selectbebida");
    fetch("/bebidasjson")
        .then((response) => response.json())
        .then((databebidas) => {
            console.log(databebidas.bebidas);

            for (
                let index = 0;
                index <= databebidas.bebidas.length - 1;
                index++
            ) {
                selectbebida.innerHTML +=
                    '<option class="" value="' +
                    index +
                    '">' +
                    databebidas.bebidas[index].nombrebebida +
                    " - " +
                    databebidas.bebidas[index].tamanio +
                    "</option>";
            }

            selectbebida.addEventListener("change", function () {
                let index = this.value;
                let preciobebida = document.getElementById("preciobebida");
                let idbebida = document.getElementById("idbebida");
                let cantidadbebida = document.getElementById("cantidadbebida");

                if (index == "def") {
                    botonagregarbebida.disabled = true;
                    botonaumentarbebida.disabled=true;
                } else {
                    botonagregarbebida.disabled = false;
                    botonaumentarbebida.disabled=false;
                }
                preciobebida.innerText = databebidas.bebidas[index].precio;
                idbebida.innerText = databebidas.bebidas[index].id;
                cantidadbebida.value = 1;
            });
        });
}

function cargarplatos() {
    let selectplato = document.getElementById("selectplato");
    fetch("/platillosjson")
        .then((response) => response.json())
        .then((data) => {
            console.log(data.platillos);

            for (let index = 0; index <= data.platillos.length - 1; index++) {
                selectplato.innerHTML +=
                    '<option class="optionplato" value="' +
                    index +
                    '">' +
                    data.platillos[index].nombreplatillo +
                    "  -  " +
                    data.platillos[index].tamanio +
                    "</option>";
            }
            selectplato.addEventListener("change", function () {
                let index = this.value;
                let precioplato = document.getElementById("precioplato");
                let idplato = document.getElementById("idplato");
                let cantidadplato = document.getElementById("cantidadplato");

                if (index == "def") {
                    botonagregarplato.disabled = true;
                    botonaumentarplato.disabled=true;
                } else {
                    botonagregarplato.disabled = false;
                    botonaumentarplato.disabled= false;
                }
                precioplato.innerText = data.platillos[index].precio;
                idplato.innerText = data.platillos[index].id;
                cantidadplato.value = 1;
            });
            //  data.platillos[0].nombreplatillo + " - " + data.platillos[0].tamanio;
        });
}

cargarplatos();
cargarbebidas();
cargarcomplementos();

//logica de la interfaz - botones de platos - bebidas - complementos
function mostrarplatos() {
    formplatos.style.display = "flex";
    formbebidas.style.display = "none";
    formcomplementos.style.display = "none";
}
function mostrarbebidas() {
    formplatos.style.display = "none";
    formbebidas.style.display = "flex";
    formcomplementos.style.display = "none";
}
function mostrarcomplementos() {
    formplatos.style.display = "none";
    formbebidas.style.display = "none";
    formcomplementos.style.display = "flex";
}
function cerrarformulario() {
    formplatos.style.display = "none";
    formbebidas.style.display = "none";
    formcomplementos.style.display = "none";
}
function cerraralerta() {
    let alerta = document.getElementsByClassName("alerta");
    alerta[0].style.display = "none";
    alerta[1].style.display = "none";
    alerta[2].style.display = "none";
}

botonplatos.addEventListener("click", mostrarplatos);
botonbebidas.addEventListener("click", mostrarbebidas);
botoncomplementos.addEventListener("click", mostrarcomplementos);
botoncerrar[0].addEventListener("click", cerrarformulario);
botoncerrar[1].addEventListener("click", cerrarformulario);
botoncerrar[2].addEventListener("click", cerrarformulario);
botoncerraralerta[0].addEventListener("click", cerraralerta);
botoncerraralerta[1].addEventListener("click", cerraralerta);
botoncerraralerta[2].addEventListener("click", cerraralerta);
//AGREGAR PEDIDOS

let tablaplatos = document.getElementById("tablaplatos");
let platotabla = document.getElementById("platotabla");
let cantidadtabla = document.getElementById("cantidadtabla");
let preciotabla = document.getElementById("preciotabla");

let indextabla = 0;

function borrardetallepedido(indextabla) {
    let indexpedido = document.getElementById(indextabla);
    indexpedido.replaceWith(" ");
    console.log(indextabla);
}
function agregarplato() {
    let nombreplato = document.getElementById("selectplato");
    let cantidadplato = document.getElementById("cantidadplato");
    let precioplato = document.getElementById("precioplato");
    let idplato = document.getElementById("idplato");
    let platoseleccionado = nombreplato.options[nombreplato.selectedIndex];
    let cantidad = cantidadplato.value;
    let precio = precioplato.textContent;

    let subtotal = cantidad * precio;
    indextabla = indextabla + 1;

    if (cantidad <= 0) {
        let alertacantidad = document.getElementsByClassName("alerta");
        alertacantidad[0].style.display = "flex";
    } else {
        tablaplatos.innerHTML +=
            "<tr id='" +
            indextabla +
            "'>" +
            "<th class='idplato'>" +
            idplato.textContent +
            "</td>" +
            "<td >" +
            platoseleccionado.text +
            "</td>" +
            "<td class='cantidadplato'>" +
            cantidad +
            "</td>" +
            "<td>" +
            precio +
            " </td>" +
            "<td class='subtotalplato subtotal'>" +
            subtotal +
            "</td>" +
            "<td>" +
            "<div class='btn-group' role='group'>" +
            "<button type='button' onclick='borrardetallepedido(" +
            indextabla +
            ")' class='borrardetalle btn btn-danger'>DEL</button>" +
            "</div>" +
            "</td>" +
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

    if (cantidad <= 0) {
        let alertacantidadbebida = document.getElementsByClassName("alerta");
        alertacantidadbebida[1].style.display = "flex";
    } else {
        tablaplatos.innerHTML +=
            "<tr id='" +
            indextabla +
            "'>" +
            "<th class='idbebida'>" +
            idbebida.textContent +
            "</td>" +
            "<td>" +
            bebidaseleccionada.text +
            "</td>" +
            "<td class='cantidadbebida'>" +
            cantidad +
            "</td>" +
            "<td>" +
            precio +
            " </td>" +
            "<td class='subtotalbebida subtotal'>" +
            subtotal +
            "</td>" +
            "<td>" +
            "<div class='btn-group' role='group'>" +
            "<button type='button' onclick='borrardetallepedido(" +
            indextabla +
            ")' class='borrardetalle btn btn-danger'>DEL</button>" +
            "</div>" +
            "</td>" +
            "</tr>";
    }
}

botonagregarbebida.addEventListener("click", agregarbebida);

//Agregar Complementos
function agregarcomplemento() {
    let nombrecomplemento = document.getElementById("selectcomplemento");
    let cantidadcomplemento = document.getElementById("cantidadcomplemento");
    let preciocomplemento = document.getElementById("preciocomplemento");
    let idcomplemento = document.getElementById("idcomplemento");

    let complementoseleccionado =
        nombrecomplemento.options[nombrecomplemento.selectedIndex];
    let cantidad = cantidadcomplemento.value;
    let precio = preciocomplemento.textContent;

    let subtotal = cantidad * precio;
    indextabla = indextabla + 1;
    if (cantidad <= 0) {
        let alertacantidadcomplemento =
            document.getElementsByClassName("alerta");
        alertacantidadcomplemento[2].style.display = "flex";
    } else {
        tablaplatos.innerHTML +=
            "<tr id='" +
            indextabla +
            "'>" +
            "<th class='idcomplemento'>" +
            idcomplemento.textContent +
            "</td>" +
            "<td>" +
            complementoseleccionado.text +
            "</td>" +
            "<td class='cantidadcomplemento'>" +
            cantidad +
            "</td>" +
            "<td>" +
            precio +
            " </td>" +
            "<td class='subtotalcomplemento subtotal'>" +
            subtotal +
            "</td>" +
            "<td>" +
            "<div class='btn-group' role='group'>" +
            "<button type='button' onclick='borrardetallepedido(" +
            indextabla +
            ")' class='borrardetalle btn btn-danger'>DEL</button>" +
            "</div>" +
            "</td>" +
            "</tr>";
    }
}

botonagregarcomplemento.addEventListener("click", agregarcomplemento);

function crearpedido() {
    let idmesa = document.getElementById("idmesa");
    let fecha = document.getElementById("fecha");
    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    fetch("/pedidostore", {
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json, text-plain, */*",
            "X-Requested-Whith": "XMLHttpRequest",
            "X-CSRF-TOKEN": token,
        },
        method: "post",
        credentials: "same-origin",
        body: JSON.stringify({
            fecha: fecha.textContent,
            totalapagar: "00",
            estado: "0",
            idmesa: idmesa.textContent,
            iduser: idusuario.textContent, 
        }),
    })
        .then((data) => {
            console.log("pedidoguardado");
            cargarpedido();
        })
        .catch(function (error) {
            console.log(error);
        });
}



function verpedidos() {}
botonverpedido.addEventListener("click", verpedidos);





function borraratencion() {
    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    let idpedido = document.getElementById("idpedido");
    fetch("/pedidodelete/" + idpedido.textContent, {
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json, text-plain, */*",
            "X-Requested-Whith": "XMLHttpRequest",
            "X-CSRF-TOKEN": token,
        },
        method: "DELETE",
        credentials: "same-origin",
    })
        .then((data) => {
            console.log("pedido eliminado");
            idpedido.textContent="";
        })
        .catch(function (error) {
            console.log(error);
        });

}

function atendermesa() {

  if (listapedidos.length>0) {
        alert("Esta MESA esta OCUPADA");      
  }else {
        
    

    crearpedido();
    let botonesproductos = document.getElementById("botonesproductos");
    let secciondetallepedidos = document.getElementById("secciondetallepedidos");
    botonaumentarpedido.style.display="none";
        
    secciondetallepedidos.style.display = "flex";
    botonesproductos.style.display = "flex";
    botonatendermesa.disabled = true;
    botoncancelarpedido.disabled = false;
}
}

function cargarpedido() {
    let idmesa = document.getElementById("idmesa");
    let idpedido = document.getElementById("idpedido");
    let total = document.getElementById("totalapagar");
    fetch("/pedidojson/" + idmesa.textContent)
        .then((response) => response.json())
        .then((datapedidos) => {
            console.log(datapedidos.pedidos);
            idpedido.textContent = datapedidos.pedidos.id;
            total.textContent = datapedidos.pedidos.totalapagar;
        });
}

botonatendermesa.addEventListener("click", atendermesa);

function cancelarpedido() {
    let botonesproductos = document.getElementById("botonesproductos");    
    let secciondetallepedidos = document.getElementById("secciondetallepedidos");
    let formplatos = document.getElementById("formplatos");
    let formbebidas = document.getElementById("formbebidas");
    let formcomplementos = document.getElementById("formcomplementos");

   
    
    borraratencion();

    formplatos.style.display = "none";
    formbebidas.style.display = "none";
    formcomplementos.style.display = "none";
    secciondetallepedidos.style.display = "none";
    botonesproductos.style.display = "none";
    botonatendermesa.disabled = false;
    botoncancelarpedido.disabled = true;
    
}

botoncancelarpedido.addEventListener("click", cancelarpedido);

function sumarsubtotales() {
    let subtotales = document.getElementsByClassName("subtotal");
    let totalapagar = document.getElementById("totalapagar");
    let total = 0.0;
    let subtotal = 0.0;
    for (let i = 0; i < subtotales.length; i++) {
        subtotal = subtotales[i].textContent;

        total = Number(subtotal) + Number(total);
        console.log(total);
    }
    totalapagar.textContent = total;
}

function modificaestadomesa(estado){
    let idmesa = document.getElementById("idmesa");
    let nombremesa = document.getElementById("nombremesa");
    let nrosillas = document.getElementById("nrosillas");
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    fetch("/mesaupdate/"+ idmesa.textContent ,{
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json, text-plain, */*",
            "X-Requested-Whith": "XMLHttpRequest",
            "X-CSRF-TOKEN": token,
        },
        method: "POST",
        credentials: "same-origin",
        body: JSON.stringify({
            nromesa: nombremesa.textContent,
            nrosillas: nrosillas.textContent,
            estado: estado,
            
        }),
    })
    .then((data)=>{
        console.log("estado de mesa modificado");
    })
    .catch(function(error){
        console.log(error);
    });

}
//funcion para cambiar el estado del pedido
function atendido(){
    let idpedidoconfirmado = document.getElementById("idpedidoconfirmado");
    let totalapagarconfirmado=document.getElementById("totalapagarconfirmado");
    let fechaconfirmada=document.getElementById("fechaconfirmada");
    let idmesa=document.getElementById("idmesa");
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");
    
    fetch("/pedidoupdate/" + idpedidoconfirmado.textContent, {
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json, text-plain, */*",
            "X-Requested-Whith": "XMLHttpRequest",
            "X-CSRF-TOKEN": token,
        },
        method: "PUT",
        credentials: "same-origin",
        body: JSON.stringify({
            fecha: fechaconfirmada.textContent,
            totalapagar: totalapagarconfirmado.textContent,
            estado: "1",
            idmesa: idmesa.textContent,
            iduser: idusuario.textContent,
        }),
    })
        .then((data) => {
            console.log("estado de pedido cambiado ")
            
        })
        .catch(function (error) {
            console.log(error);
        });
        modificaestadomesa(1);
        window.location.replace("/mesasmesero");

}
//botonatendido.addEventListener("click",atendido);


function modificarpedido() {
    sumarsubtotales();
    let idpedido = document.getElementById("idpedido");
    let totalapagar=document.getElementById("totalapagar");
    let idmesa=document.getElementById("idmesa");
  
    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    fetch("/pedidoupdate/" + idpedido.textContent, {
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json, text-plain, */*",
            "X-Requested-Whith": "XMLHttpRequest",
            "X-CSRF-TOKEN": token,
        },
        method: "PUT",
        credentials: "same-origin",
        body: JSON.stringify({
            fecha: fecha.textContent,
            totalapagar: totalapagar.textContent,
            estado: "0",
            idmesa: idmesa.textContent,
            iduser: idusuario.textContent,
        }),
    })
        .then((data) => {
            console.log("pedidomodificado")
            
        })
        .catch(function (error) {
            console.log(error);
        });
}

function confirmarpedido() {
  
        modificarpedido();
    let verificador = document.getElementsByClassName('subtotal');
    if (verificador.length==0) {
        alert("NO puedes confirmar un pedido VACIO");
    } else {
         
    
    let idplatos = document.getElementsByClassName("idplato");
    let cantidadplatos = document.getElementsByClassName("cantidadplato");
    let subtotalplatos = document.getElementsByClassName("subtotalplato");

    let idbebidas = document.getElementsByClassName("idbebida");
    let cantidadbebidas = document.getElementsByClassName("cantidadbebida");
    let subtotalbebidas = document.getElementsByClassName("subtotalbebida");

    let idcomplementos = document.getElementsByClassName("idcomplemento");
    let cantidadcomplementos = document.getElementsByClassName(
        "cantidadcomplemento"
    );
    let subtotalcomplemento = document.getElementsByClassName(
        "subtotalcomplemento"
    );
    let idpedido = document.getElementById("idpedido");
    //console.log(idplatos);

    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    for (let i = 0; i < idplatos.length; i++) {
        let platosconfirmado = idplatos[i];
        let cantidadplatoconfirmado = cantidadplatos[i];
        let subtotalplatoconfirmado = subtotalplatos[i];

        fetch("/detallestore", {
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json, text-plain, */*",
                "X-Requested-Whith": "XMLHttpRequest",
                "X-CSRF-TOKEN": token,
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify({
                idpedido: idpedido.textContent,
                idplatillo: platosconfirmado.textContent,
                idbebida: "",
                idcomplemento: "",
                cantidad: cantidadplatoconfirmado.textContent,
                subtotal: subtotalplatoconfirmado.textContent,
            }),
        })
            .then((data) => {
                console.log("detalles guardados");
            })
            .catch(function (error) {
                console.log(error);
            });
        //console.log("platos" +platosconfirmado.textContent + cantidadplatoconfirmado.textContent + subtotalplatoconfirmado.textContent);
    }

    for (let i = 0; i < idbebidas.length; i++) {
        let bebidasconfirmada = idbebidas[i];
        let cantidadbebidaconfirmada = cantidadbebidas[i];
        let subtotalbebidaconfirmada = subtotalbebidas[i];
        fetch("/detallestore", {
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json, text-plain, */*",
                "X-Requested-Whith": "XMLHttpRequest",
                "X-CSRF-TOKEN": token,
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify({
                idpedido: idpedido.textContent,
                idplatillo: "",
                idbebida: bebidasconfirmada.textContent,
                idcomplemento: "",
                cantidad: cantidadbebidaconfirmada.textContent,
                subtotal: subtotalbebidaconfirmada.textContent,
            }),
        })
            .then((data) => {
                console.log("detalles guardados");
            })
            .catch(function (error) {
                console.log(error);
            });
        //console.log("bebida"+ bebidasconfirmada.textContent + cantidadbebidaconfirmada.textContent + subtotalbebidaconfirmada.textContent);
    }

    for (let i = 0; i < idcomplementos.length; i++) {
        let complementosconfirmado = idcomplementos[i];
        let cantidadcomplementoconfirmado = cantidadcomplementos[i];
        let subtotalcomplementoconfirmado = subtotalcomplemento[i];
        fetch("/detallestore", {
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json, text-plain, */*",
                "X-Requested-Whith": "XMLHttpRequest",
                "X-CSRF-TOKEN": token,
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify({
                idpedido: idpedido.textContent,
                idplatillo: "",
                idbebida: "",
                idcomplemento: complementosconfirmado.textContent,
                cantidad: cantidadcomplementoconfirmado.textContent,
                subtotal: subtotalcomplementoconfirmado.textContent,
            }),
        })
            .then((data) => {
                console.log("detalles guardados");
            })
            .catch(function (error) {
                console.log(error);
            });
        console.log(
            "complemento" +
                complementosconfirmado.textContent +
                cantidadcomplementoconfirmado.textContent +
                subtotalcomplementoconfirmado.textContent
        );
    }
   
    modificaestadomesa(0);
    location.reload();
}
}

botonconfirmarpedido.addEventListener("click", confirmarpedido);
function sumarsubtotalesaumento(nuevototal){
    let subtotales = document.getElementsByClassName("subtotal");
    let totalpedido = document.getElementById("totalapagarconfirmado");
    let total = 0.0;
    let subtotal = 0.0;
    //let nuevototal=0;
    for (let i = 0; i < subtotales.length; i++) {
        subtotal = subtotales[i].textContent;

        total = Number(subtotal) + Number(total);
        console.log(total);
    }
    nuevototal= Number(total)  +  Number(totalpedido.textContent);
    return nuevototal;
    
}
function aumentarpedido(){
    let botonesproductos = document.getElementById("botonesproductos");
    let secciondetallepedidos = document.getElementById("secciondetallepedidos");
    secciondetallepedidos.style.display = "flex";
    botonesproductos.style.display = "flex";
    botonagregarplato.style.display="none";
    botonagregarbebida.style.display="none";
    botonagregarcomplemento.style.display="none";
    botonconfirmarpedido.style.display="none";
    botonaumentarplato.style.display = "flex";
    botonaumentarbebida.style.display = "flex";
    botonaumentarcomplemento.style.display = "flex";
    
}

botonaumentarplato.addEventListener("click", agregarplato);
botonaumentarbebida.addEventListener("click", agregarbebida);
botonaumentarcomplemento.addEventListener("click", agregarcomplemento);

function confirmaraumentopedido(){

    //recalculando el totalapagar de pedido para agregar el nuevo detalle de pedido
let total = sumarsubtotalesaumento();
console.log(total);

let idpedido = document.getElementById("idpedidoconfirmado");
let fecha =document.getElementById("fechaconfirmada");
let totalapagar=document.getElementById("totalapagarconfirmado");
let idmesa=document.getElementById("idmesa");
let token = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

totalapagar.textContent= total;

//verificamos si la lista de p??didos esta vacia y si no lo esta modificamos el pedido para poner el nuevo precio
let verificador = document.getElementsByClassName('subtotal');
    if (verificador.length==0) {
        alert("NO puedes confirmar un pedido VACIO");
    } else {
   fetch("/pedidoupdate/" + idpedido.textContent, {
    headers: {
        "Content-Type": "application/json",
        Accept: "application/json, text-plain, */*",
        "X-Requested-Whith": "XMLHttpRequest",
        "X-CSRF-TOKEN": token,
    },
    method: "PUT",
    credentials: "same-origin",
    body: JSON.stringify({
        fecha: fecha.textContent,
        totalapagar: totalapagar.textContent,
        estado: "0",
        idmesa: idmesa.textContent,
        iduser: idusuario.textContent,
        }),
    })
    .then((data) => {
        console.log("pedidomodificado")
        
    })
    .catch(function (error) {
        console.log(error);
    });

    //agregar el nuevo pedido

    //caturamos los pedidos de la lista para luego recorrer los arrays
    let idplatos = document.getElementsByClassName("idplato");
    let cantidadplatos = document.getElementsByClassName("cantidadplato");
    let subtotalplatos = document.getElementsByClassName("subtotalplato");

    let idbebidas = document.getElementsByClassName("idbebida");
    let cantidadbebidas = document.getElementsByClassName("cantidadbebida");
    let subtotalbebidas = document.getElementsByClassName("subtotalbebida");

    let idcomplementos = document.getElementsByClassName("idcomplemento");
    let cantidadcomplementos = document.getElementsByClassName(
        "cantidadcomplemento"
    );
    let subtotalcomplemento = document.getElementsByClassName(
        "subtotalcomplemento"
    );
    
    //console.log(idplatos);
    for (let i = 0; i < idplatos.length; i++) {
        let platosconfirmado = idplatos[i];
        let cantidadplatoconfirmado = cantidadplatos[i];
        let subtotalplatoconfirmado = subtotalplatos[i];

        fetch("/detallestore", {
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json, text-plain, */*",
                "X-Requested-Whith": "XMLHttpRequest",
                "X-CSRF-TOKEN": token,
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify({
                idpedido: idpedido.textContent,
                idplatillo: platosconfirmado.textContent,
                idbebida: "",
                idcomplemento: "",
                cantidad: cantidadplatoconfirmado.textContent,
                subtotal: subtotalplatoconfirmado.textContent,
            }),
        })
            .then((data) => {
                console.log("detalles guardados");
            })
            .catch(function (error) {
                console.log(error);
            });
        //console.log("platos" +platosconfirmado.textContent + cantidadplatoconfirmado.textContent + subtotalplatoconfirmado.textContent);
    
        


    }

    for (let i = 0; i < idbebidas.length; i++) {
        let bebidasconfirmada = idbebidas[i];
        let cantidadbebidaconfirmada = cantidadbebidas[i];
        let subtotalbebidaconfirmada = subtotalbebidas[i];
        fetch("/detallestore", {
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json, text-plain, */*",
                "X-Requested-Whith": "XMLHttpRequest",
                "X-CSRF-TOKEN": token,
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify({
                idpedido: idpedido.textContent,
                idplatillo: "",
                idbebida: bebidasconfirmada.textContent,
                idcomplemento: "",
                cantidad: cantidadbebidaconfirmada.textContent,
                subtotal: subtotalbebidaconfirmada.textContent,
            }),
        })
            .then((data) => {
                console.log("detalles guardados");
            })
            .catch(function (error) {
                console.log(error);
            });
        //console.log("bebida"+ bebidasconfirmada.textContent + cantidadbebidaconfirmada.textContent + subtotalbebidaconfirmada.textContent);
    }




    for (let i = 0; i < idcomplementos.length; i++) {
        let complementosconfirmado = idcomplementos[i];
        let cantidadcomplementoconfirmado = cantidadcomplementos[i];
        let subtotalcomplementoconfirmado = subtotalcomplemento[i];
        fetch("/detallestore", {
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json, text-plain, */*",
                "X-Requested-Whith": "XMLHttpRequest",
                "X-CSRF-TOKEN": token,
            },
            method: "post",
            credentials: "same-origin",
            body: JSON.stringify({
                idpedido: idpedido.textContent,
                idplatillo: "",
                idbebida: "",
                idcomplemento: complementosconfirmado.textContent,
                cantidad: cantidadcomplementoconfirmado.textContent,
                subtotal: subtotalcomplementoconfirmado.textContent,
            }),
        })
            .then((data) => {
                console.log("detalles guardados");
            })
            .catch(function (error) {
                console.log(error);
            });
        console.log(
            "complemento" +
                complementosconfirmado.textContent +
                cantidadcomplementoconfirmado.textContent +
                subtotalcomplementoconfirmado.textContent
        );
    }


            location.reload();

    }

}


botonaumentarpedido.addEventListener("click", confirmaraumentopedido);