@extends('layouts.layoutadmin')

@section('content')
<div class="container">
    <h3>Pedidos Cobrados de Hoy</h3>
    @foreach ($pedidos as $pedido)

         <div class="card text-white bg-success m-2 listapedidos" style="max-width: 38rem;" id="cardpedido">
              <div class="card-header fs-4"><strong> Nro de Pedido: </strong> <strong class="badge bg-warning text-dark" id="idpedidoconfirmado">{{$pedido->id}}</strong></div>
              <div class="card-body">
                <p class="card-text fs-4 fw-bold" id="fechaconfirmada">{{$pedido->fecha}} </p>  
                @if ($pedido->estado == 3)
                <span class="badge rounded-pill bg-primary text-white mb-2 p-2 fs-5">Cobrado</span>
                @else                            
                <span class="badge rounded-pill bg-danger  mb-2 p-2 fs-5">Atendido</span>     
                @endif    
                <hr>                                         
              @foreach ($pedido->detallepedidos as $detalle)                          
                <div class="card text-dark bg-warning mb-3" style="max-width: 30rem;"> 
                                    
                  @if ($detalle->idplatillo==null)
                   
                  @else
                  <p class="m-1 p-1 fs-4 fw-bold">{{$detalle->platillos['nombreplatillo']}}</p>
                  <p class="m-1 p-1 fs-3"> <strong>Tamaño: </strong> {{$detalle->platillos['tamanio']}}</p>
                  <p class="m-1 p-1 fs-3"> <strong>Precio Unit.: </strong> {{$detalle->platillos['precio']}}</p>

                  @endif
                 
                  @if ($detalle->idbebida==null)
                    
                  @else
                  <p class="m-1 p-1 fs-4 fw-bold">{{$detalle->bebidas['nombrebebida']}}</p>
                  <p class="m-1 p-1 fs-3"><strong>Tamaño: </strong> {{$detalle->bebidas['tamanio']}}</p> 
                  <p class="m-1 p-1 fs-3"><strong>Precio Unit.: </strong> {{$detalle->bebidas['precio']}}</p> 
                  @endif
                  
                  @if ($detalle->idcomplemento == null)
                      
                  @else
                  <p class="m-1 p-1 fs-4 fw-bold">{{$detalle->complementos['nombrecomplemento']}}</p>
                  <p class="m-1 p-1 fs-3"> <strong>Tamaño:</strong> {{$detalle->complementos['tamanio']}}</p>
                  <p class="m-1 p-1 fs-3"> <strong>Precio Unit.:</strong> {{$detalle->complementos['precio']}}</p> 
                  @endif   
                   
                  <p class="m-1 p-1 fs-3"> <strong class="fs-4"> Cant: </strong> {{$detalle->cantidad}}</p>  
                  <p class="m-1 p-1 fs-3"> <strong class="fs-4"> Subtotal: </strong> {{$detalle->subtotal}}</p>  
                                

                </div>                   
                <hr> 
                                                    
              @endforeach   
               
              </div>
              <hr>
              <h5 class="card-title p-2 fs-3"> <strong> Precio:</strong> <strong id="totalapagarconfirmado"> {{$pedido->totalapagar}} </strong> <strong> s/. </strong> </h5>
          </div>
    @endforeach
</div>
    
@endsection