let botoncobrarpedido = document.getElementById("botoncobrarpedido");


function imprimirboleta(){
    let boleta = document.getElementById('cardpedido').innerHTML;
            w = window.open();
            w.document.write(boleta);
            w.document.close(); // necessary for IE >= 10
            w.focus(); // necessary for IE >= 10
            w.print();
            w.close();
            return true;
}



function modificarpedido() {
    
    let idpedido = document.getElementById("idpedidoconfirmado");
    let totalapagar=document.getElementById("totalapagarconfirmado");
    let idmesa=document.getElementById("idmesa");
    let fecha = document.getElementById("fechaconfirmada");

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
            estado: "3",
            idmesa: idmesa.textContent,
        }),
    })
        .then((data) => {
            console.log("pedido cobrado")
            imprimirboleta();
            location.reload();
            
        })
        .catch(function (error) {
            console.log(error);
        });
    
}


botoncobrarpedido.addEventListener("click", modificarpedido);

