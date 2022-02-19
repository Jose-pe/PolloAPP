@extends('layouts.layoutcajero')
@section('content')
<section class="container">
    <div class="row mt-5">   
            <div class="col">
                <h2 class="text-success">Pedidos listos para cobrar <span class="badge rounded-pill bg-success"> {{$mesa->nromesa}}</span> </h2>

                <p class="">{{$mesa->nrosillas}}</p>
            </div>
       
    </div>
    <div class="row mt-4">
        @foreach ($mesa->pedidos as $pedido)
            @if ($pedido->estado ==0)
                
            @else
           

            <div class="card text-white bg-success m-2 listapedidos" style="max-width: 38rem;">
                <div class="card-header fs-4"><strong> Nro de Pedido: </strong> <strong class="badge bg-warning text-dark" id="idpedidoconfirmado">{{$pedido->id}}</strong></div>
                <div class="card-body">
                  <p class="card-text fs-4 fw-bold" id="fechaconfirmada">{{$pedido->fecha}} </p>  
                  @if ($pedido->estado == 0)
                  <span class="badge rounded-pill bg-warning text-dark mb-2 p-2 fs-5">En Espera</span>
                  @else                            
                  <span class="badge rounded-pill bg-danger  mb-2 p-2 fs-5">Atendido</span>     
                  @endif                                             
                @foreach ($pedido->detallepedidos as $detalle)                          
                  <div class="card text-dark bg-warning mb-3" style="max-width: 30rem;"> 
                                      
                    @if ($detalle->idplatillo==null)
                     
                    @else
                    <p class="m-1 p-1 fs-4 fw-bold">{{$detalle->platillos['nombreplatillo']}}</p>
                    <p class="m-1 p-1 fs-3"> <strong>Tamaño: </strong> {{$detalle->platillos['tamanio']}}</p>
  
                    @endif
                   
                    @if ($detalle->idbebida==null)
                      
                    @else
                    <p class="m-1 p-1 fs-4 fw-bold">{{$detalle->bebidas['nombrebebida']}}</p>
                    <p class="m-1 p-1 fs-3"><strong>Tamaño: </strong> {{$detalle->bebidas['tamanio']}}</p> 
                    @endif
                    
                    @if ($detalle->idcomplemento == null)
                        
                    @else
                    <p class="m-1 p-1 fs-4 fw-bold">{{$detalle->complementos['nombrecomplemento']}}</p>
                    <p class="m-1 p-1 fs-3"> <strong>Tamaño:</strong> {{$detalle->complementos['tamanio']}}</p> 
                    @endif     
                    <p class="m-1 p-1 fs-3"> <strong class="fs-4"> Cant: </strong> {{$detalle->cantidad}}</p>  
  
                  </div>                   
                 
                                                      
                @endforeach   
                <div class="row">
                  <hr>
                 
                 
                    <a class="btn btn-danger btn-lg">Cobrar Pedido</a>
                 
                 </div>       
                </div>
                <hr>
                <h5 class="card-title p-2 fs-3"> <strong> Precio:</strong> <strong id="totalapagarconfirmado"> {{$pedido->totalapagar}} </strong> <strong> s/. </strong> </h5>
            </div>



            @endif
        @endforeach
        
    </div>

</section>

@endsection