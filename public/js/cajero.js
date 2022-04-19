let botoncobrarpedido = document.getElementById("botoncobrarpedido");




function imprimirboleta(){
    let boleta = document.getElementById('cardpedido').innerHTML;
            w = window.open();
            w.document.write(boleta);
            w.document.close(); //  para IE >= 10
            w.focus(); // para IE >= 10
            w.print();
            w.close();
            return true;
}

function crearboleta(){
    let nroboleta = document.getElementById('numerodeboleta').value;
    let iduser = document.getElementById('idusuario');
    let idpedido= document.getElementById("idpedidoconfirmado");
    let fecha = document.getElementById("fechaconfirmada");
    let total = document.getElementById("totalapagarconfirmado");
    let token = document
    .querySelector('meta[name="csrf-token"]')
    .getAttribute("content");

    fetch("/boletastore", {
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json, text-plain, */*",
            "X-Requested-Whith": "XMLHttpRequest",
            "X-CSRF-TOKEN": token,
        },
        method: "post",
        credentials: "same-origin",
        body: JSON.stringify({

            nro : nroboleta,
            fecha: fecha.textContent,
            total: total.textContent,
            idpedido: idpedido.textContent,
            iduser: iduser.textContent, 
        }),
    })
        .then((data) => {
            console.log("Boletaguardada");
           
        })
        .catch(function (error) {
            console.log(error);
        });

}

function modificarpedido() {
    let nroboleta = document.getElementById('numerodeboleta').value;
    let idpedido = document.getElementById("idpedidoconfirmado");
    let totalapagar=document.getElementById("totalapagarconfirmado");
    let idmesa=document.getElementById("idmesa");
    let fecha = document.getElementById("fechaconfirmada");
    
    let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");


    if (nroboleta !== "") {
        
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
                console.log("pedido cobrado");
                crearboleta();
                imprimirboleta();
                location.reload();
                
            })
            .catch(function (error) {
                console.log(error);
            });
       
    }else{
        alert("Nro de boleta invalido");
        let alertcajero = document.getElementById("alertcajero");
        alertcajero.style.display="flex";
        //console.log("nro de BOleta Invalido");
    }
}


botoncobrarpedido.addEventListener("click", modificarpedido);

