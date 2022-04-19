@extends('layouts.layoutadmin')

@section('content')
<div class="container mt-5">
   
    <div class="row justify-content-center m-4 ">
      
            <div class="col-6 offset-1 mb-4">
            <button type="button" id="botonpormesa" class="btn btn-warning">Buscar por Mesa</button>
            <button type="button" id="botonporfecha" class="btn btn-warning">Buscar por Fecha</button>
            <button type="button" id="botonpormesero" class="btn btn-warning">Buscar por Mesero</button>
          </div>

          <div id="buscarpormesa" class="row justify-content-center mt-4">
          <div class="col-6">
            <div class="row">
              <div class="input-group">
                <select class="form-select" id="selectmesas" aria-label="Example select with button addon">
                     <option selected value="">Seleccione una Mesa</option>              
                </select>
              </div>
          </div>
          </div>
          </div>

          <div id="buscarporfecha" class="row justify-content-center mt-4">
            <div class="col-6">
              <div class="row">
                <div class="input-group">
                  <input type="date" class="form-control" id="fecha" aria-describedby="button-addon2">
                </div>
            </div>
            </div>
            </div>

            <div id="buscarpormesero" class="row justify-content-center mt-4">
              <div class="col-6">
                <div class="row">
                  <div class="input-group">
                    <select class="form-select" id="selectmesero" aria-label="Example select with button addon">
                      <option selected value="">Seleccione un Mesero</option> 
                    </select>
                  </div>
              </div>
              </div>
              </div>
   
    </div>
    <h3 id="subtitulo">Pedidos Cobrados de Hoy</h3>
    <div class="row justify-content-center mt-5">

      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col"># Pedido</th>
            <th scope="col">Fecha</th>
            <th scope="col">Estado</th>

            <th scope="col">Total</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="tablapedido">

          
          
         

         
        </tbody>
      </table>

        <!--     
    @foreach ($pedidos as $pedido)
      <div class="col-12 mt-5 m-1">

        
         <div class="card text-white bg-success m-1 listapedidos" style="width:70rem;" id="cardpedido">
              <div class="card-header fs-5"><strong> Nro de Pedido: </strong> <strong class="badge bg-warning text-dark" id="idpedidoconfirmado">{{$pedido->id}}</strong></div>
              <div class="card-body">
                <p class="card-text fs-5 fw-bold" id="fechaconfirmada">{{$pedido->fecha}} </p>  
                @if ($pedido->estado == 3)
                <span class="badge rounded-pill bg-primary text-white mb-2 p-2 fs-5">Cobrado</span>
                @else                            
                <span class="badge rounded-pill bg-danger  mb-2 p-2 fs-5">Atendido</span>     
                @endif                  
               
                  
                                            
              @foreach ($pedido->detallepedidos as $detalle)                          
                <div class="card text-dark bg-warning mb-3" style="max-width: 20rem;"> 
                                    
                  @if ($detalle->idplatillo==null)
                   
                  @else
                  <p class="m-1 p-1 fs-5 fw-bold">{{$detalle->platillos['nombreplatillo']}}</p>
                  <p class="m-1 p-1 fs-5"> <strong>Tamaño: </strong> {{$detalle->platillos['tamanio']}}</p>
                  <p class="m-1 p-1 fs-5"> <strong>Precio Unit.: </strong> {{$detalle->platillos['precio']}}</p>

                  @endif
                 
                  @if ($detalle->idbebida==null)
                    
                  @else
                  <p class="m-1 p-1 fs-5 fw-bold">{{$detalle->bebidas['nombrebebida']}}</p>
                  <p class="m-1 p-1 fs-5"><strong>Tamaño: </strong> {{$detalle->bebidas['tamanio']}}</p> 
                  <p class="m-1 p-1 fs-5"><strong>Precio Unit.: </strong> {{$detalle->bebidas['precio']}}</p> 
                  @endif
                  
                  @if ($detalle->idcomplemento == null)
                      
                  @else
                  <p class="m-1 p-1 fs-5 fw-bold">{{$detalle->complementos['nombrecomplemento']}}</p>
                  <p class="m-1 p-1 fs-5"> <strong>Tamaño:</strong> {{$detalle->complementos['tamanio']}}</p>
                  <p class="m-1 p-1 fs-5"> <strong>Precio Unit.:</strong> {{$detalle->complementos['precio']}}</p> 
                  @endif   
                   
                  <p class="m-1 p-1 fs-5"> <strong class="fs-5"> Cant: </strong> {{$detalle->cantidad}}</p>  
                  <p class="m-1 p-1 fs-5"> <strong class="fs-5"> Subtotal: </strong> {{$detalle->subtotal}}</p>  
                                

                </div>                   
                <hr> 
                                                    
              @endforeach   
           
              
            </div>
            
              <hr>
              <h5 class="card-title p-2 fs-3"> <strong> Precio:</strong> <strong id="totalapagarconfirmado"> {{$pedido->totalapagar}} </strong> <strong> s/. </strong> </h5>
          </div>
        </div>
    @endforeach
  </div>
</div>
         -->  
        </div>
      </div>


      <script src="../js/buscadoradmin.js"></script> 
@endsection