let botonbuscarporfecha = document.getElementById('botonbuscarporfecha');

let fechabuscar = document.getElementById('fecha');
let selectmesas = document.getElementById('selectmesas');
let tablapedidos = document.getElementById('tablapedido');
let selectmesero = document.getElementById('selectmesero');
let subtitulo = document.getElementById('subtitulo'); 
vermesas();
vermeseros();

fechabuscar.addEventListener('change', function(){

    let fecha = fechabuscar.value;
    console.log('fecha - ' + fecha);   
    mostrarpedidosporfecha(fecha);
});

selectmesas.addEventListener('change',function(){
    let idmesa = selectmesas.value;
    mostrarpedidospormesa(idmesa);
});

selectmesero.addEventListener('change', function(){
    let iduser = selectmesero.value;
    console.log("iduser= "+ iduser);
    mostrarpedidospormesero(iduser);
});


function mostrarpedidosporfecha(fecha){
    tablapedidos.innerHTML="";
   
    fetch("pedidosporfecha/" + fecha)
    .then((response) => response.json())
    .then((datapedidos) => {
        
        if (datapedidos.pedidos.length==0) {
             subtitulo.textContent= "No hay pedidos para mostrar de "+ fecha;
                
        }   
        else{
            subtitulo.textContent= "Pedidos de realizados en " + fecha;
        }
    
                   
            for (let index = 0; index < datapedidos.pedidos.length; index++) {
                 

                    tablapedidos.innerHTML +=
                    "<tr>"+
                    "<td>"+
                    datapedidos.pedidos[index].id +
                    "</td>"+
                    "<td>"+
                    datapedidos.pedidos[index].fecha +
                    "</td>"+
                    "<td>"+
                    datapedidos.pedidos[index].estado +
                    "</td>"+
                    "<td>"+
                    datapedidos.pedidos[index].totalapagar +
                    "</td>"+
                    "<td>"+
                    "<a> Ver </a>"+
                    "</td>"+
                    "</tr>";    

            }
    });

}

function mostrarpedidospormesa(idmesa){
    tablapedidos.innerHTML="";
    fetch("pedidospormesa/" + idmesa)
    .then((response) => response.json())
    .then((datapedidos) => {
        if (datapedidos.pedidos.length==0) {
            subtitulo.textContent= "No hay pedidos para mostrar de esta Mesa";
               
       }   
       else{
           subtitulo.textContent= "Pedidos Listado por Mesa";
       }
   
                  
           for (let index = 0; index < datapedidos.pedidos.length; index++) {
                

                   tablapedidos.innerHTML +=
                   "<tr>"+
                   "<td>"+
                   datapedidos.pedidos[index].id +
                   "</td>"+
                   "<td>"+
                   datapedidos.pedidos[index].fecha +
                   "</td>"+
                   "<td>"+
                   datapedidos.pedidos[index].estado +
                   "</td>"+
                   "<td>"+
                   datapedidos.pedidos[index].totalapagar +
                   "</td>"+
                   "<td>"+
                   "<a> Ver </a>"+
                   "</td>"+
                   "</tr>";    

           }
    });
}

function mostrarpedidospormesero(iduser){
    tablapedidos.innerHTML="";

    fetch("pedidosporuser/"+ iduser)
    .then((response) => response.json())
    .then((datapedidos) =>{

            if (datapedidos.pedidos.length==0) {
                subtitulo.textContent="No hay pedidos para este Mesero";
            }
            else{
                subtitulo.textContent="Pedidos de realizados por " ;
            }
                     
            for (let index = 0; index < datapedidos.pedidos.length; index++) {
                 

                tablapedidos.innerHTML +=
                "<tr>"+
                "<td>"+
                datapedidos.pedidos[index].id +
                "</td>"+
                "<td>"+
                datapedidos.pedidos[index].fecha +
                "</td>"+
                "<td>"+
                datapedidos.pedidos[index].estado +
                "</td>"+
                "<td>"+
                datapedidos.pedidos[index].totalapagar +
                "</td>"+
                "<td>"+
                "<a> Ver </a>"+
                "</td>"+
                "</tr>";    

        }
            

    });
}


function vermesas(){
    let selectmesas = document.getElementById('selectmesas');
    fetch("mostrarmesas")
    .then((response) => response.json())
    .then((datamesas) => {
            //console.log(datamesas.mesas)
        for (let index = 0; index < datamesas.mesas.length; index++) {
            selectmesas.innerHTML += "<option value='"+ datamesas.mesas[index].id +"'>"+  datamesas.mesas[index].nromesa +"</option>" ;
            
        }



    });
}

function vermeseros(){
    let selectmesero = document.getElementById('selectmesero');
    fetch("mostrarmeseros")
    .then((response) => response.json())
    .then((datameseros) => {
           
        for (let index = 0; index < datameseros.users.length; index++) {
            
            selectmesero.innerHTML += "<option value='"+ datameseros.users[index].id +"'>"+  datameseros.users[index].name +"</option>";
        }
        
    });
}
