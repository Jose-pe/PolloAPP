let botonbuscarporfecha = document.getElementById('botonbuscarporfecha');

let fechabuscar = document.getElementById('fecha');
let selectmesas = document.getElementById('selectmesas');
let tablapedidos = document.getElementById('tablapedido');
let subtitulo = document.getElementById('subtitulo'); 
vermesas();

fechabuscar.addEventListener('change', function(){

    let fecha = fechabuscar.value;
    console.log('fecha - ' + fecha);   
    mostrarpedidosporfecha(fecha);
    }
   );

selectmesas.addEventListener('change',function(){
    let idmesa = selectmesas.value;
    mostrarpedidospormesa(idmesa);
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
