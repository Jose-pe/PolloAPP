let botonbuscarporfecha = document.getElementById('botonbuscarporfecha');

let fechabuscar = document.getElementById('fecha');
let tablapedidos = document.getElementById('tablapedido');
let subtitulo = document.getElementById('subtitulo'); 

fechabuscar.addEventListener('change', function(){

    let fecha = fechabuscar.value;
    console.log('fecha - ' + fecha);   
    mostrarpedidosporfecha(fecha);
    }
   );


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


