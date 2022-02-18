@extends('layouts.layoutmesero')
@section('content')

    <section class="container">
        
          <div class="row mt-5">
            <div class="col">
              <div>
                <h2 id="nombremesa" class="text-success fs-1">{{$mesa->nromesa}}</h2>    
                @if ($mesa->estado == 0)
                <p class="badge bg-danger fs-5"> Ocupado </p>
                @else  
                <p class="badge bg-success fs-5">Libre </p>  
                @endif
                <p id="fecha" class="badge bg-success fs-5">{{date('Y-m-d')}}</p>
                <p id="nrosillas">{{$mesa->nrosillas}}</p> 
                <p id="idmesa">{{$mesa->id}}</p>
              </div>
            </div>
            <div class="col">
              <div class="btn-group mt-4">
             
                <button type="button" id="botonatendermesa" class="btn btn-success m-2 btn-lg" >Atender Mesa</button>

       
                <button type="button" id="botonverpedido" class="btn btn-success m-2 btn-lg" >Ver Pedidos</button>

           
                <button type="button" id="botoncancelarpedido" class="btn btn-danger m-2 btn-lg" disabled>Cancelar Atencion</button>
            </div>
            <p id="idpedido"></p>
            <p id="totalapagar"></p>
            </div>
          </div>

          <div class="row mt-5">               
               
            <section  class="row">
              <section class="col" id="botonesplatos">
              <div class="btn-group" id="botonesproductos">
                <button type="button" id="botonplatos" class="btn btn-warning m-2">Platos</button>
                <button type="button" id="botonbebidas" class="btn btn-warning m-2">Bebidas</button>
                <button type="button" id="botoncomplementos" class="btn btn-warning m-2">Complementos</button>
              </div>  
              </section>
                <article class="row">                         
                    <div id="formplatos" class="alert alert-warning alert-dismissible fade show" role="alert">
                      <div>      
                      <div class="mb-3">
                                <label for="plato" class="form-label">Plato</label>
                                <select  class="form-select" name="plato" required id="selectplato">
                                  <option value="def"  selected>Selecione un plato</option>                                   
                                 
                                </select>
                              </div>
                              <div >
                              <p id="idplato"></p>
                              <p id="precioplato">0.00</p>
                              
                              </div>
                              <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="number" required min="1" max="500" value="" class="form-control" id="cantidadplato" placeholder="Ingresar la Cantidad para este Pedido">
                                <div class="alerta alert alert-danger" role="alert">
                                   <p class="p-2">La cantidad del pedido tiene que ser mayor a 0</p>
                                    <button type="button"  class="botoncerraralerta btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                              </div>
                            
                        <button type="button" class="botoncerrar btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                       
                         <button id="botonaumentarplato" disabled class="btn btn-primary btn-lg">Aumentar Plato</button>  
             
                         <button id="botonagregarplato" disabled class="btn btn-primary btn-lg">Agregar Plato</button>     
                        
                       
                      </div>    
                      </div>
                     <div id="formbebidas" class="alert alert-warning alert-dismissible fade show" role="alert">
                      <div>     
                      <div class="mb-3">
                              <label for="bebida" class="form-label">Bebidas</label>
                              <select  class="form-select" name="bebida" id="selectbebida">
                               
                                <option selected value="def">Seleccione una Bebida</option>
                              
                                 
                              </select>
                            </div>
                            <div>
                              <p id="idbebida"></p>
                              <p id="preciobebida"></p>                                  
                            </div>
                            <div class="mb-3">
                              <label for="cantidad" class="form-label">Cantidad</label>
                              <input type="number" class="form-control" id="cantidadbebida" placeholder="Ingresar la Cantidad para este Pedido">
                              <div  class="alerta alert alert-danger" role="alert">
                                <p class="p-2"> La cantidad del pedido tiene que ser mayor a 0 </p>
                                <button type="button"   class="botoncerraralerta btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>

                             </div>
                            </div>
                          
                      <button type="button"  class="botoncerrar btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      <button id="botonagregarbebida" disabled class="btn  btn-primary btn-lg">Agregar Bebida</button>
                      <button id="botonaumentarbebida" disabled class="btn  btn-primary btn-lg">Aumentar Bebida</button>

                    </div>    
                    </div>
                   <div id="formcomplementos" class="alert alert-warning alert-dismissible fade show" role="alert">
                    <div>
                        <div class="mb-3">
                            <label for="complemento" class="form-label">Complemento</label>
                            <select  class="form-select" name="complemento" id="selectcomplemento">
                              
                              <option value="def">Seleccione un Complemento</option>
                            
                            </select>
                          </div>
                          <div>
                            <p id="idcomplemento"></p>
                            <p id="preciocomplemento"></p>
                          </div>
                          <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="cantidadcomplemento" placeholder="Ingresar la Cantidad para este Pedido">
                          </div>
                          <div class="alerta alert alert-danger" role="alert">
                            <p class="p-2">La cantidad del pedido tiene que ser mayor a 0</p>
                            <button type="button"  class="botoncerraralerta btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>

                         </div>
                        
                    <button type="button"  class="botoncerrar btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <button id="botonagregarcomplemento" disabled class="btn  btn-primary btn-lg">Agregar Complemento</button>
                    <button id="botonaumentarcomplemento" disabled class="btn  btn-primary btn-lg">Aumentar Complemento</button>
                    </div>
                 </div>
                </article>
                           
                                        

                </section>
                <div class="row mt-2" id="secciondetallepedidos">
                  
                        <div class="col mt-2">
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Pedido</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio Unit.</th>
                                    <th scope="col">SubTotal</th>
                                    <th scope="col">Acciones</th>
                                  </tr>
                                </thead>
                                <tbody id="tablaplatos">

                                {{--Aqui el Scrit main.js escribe los pedidos--}}
                                 
                                 
                                </tbody>
                              </table>
                              <div class="row">
                                <div class="col mt-3">
                                  <button id="botonconfirmarpedido"  type="button" class="btn btn-primary btn-lg m-3">Confirmar Pedido</button>
                                  <button id="botonaumentarpedido"  type="button" class="btn btn-primary btn-lg m-3">Aumentar Pedido</button>

                                </div>
                              
                                
                              </div>
                        </div>
                </div>

        </div>

        <section class="row mt-5">
          <h3 class="text-success p-4 fs-1">Lista de Pedidos:</h3>
        </section>


       <div class="row mb-5">
          <div class="col">

           
    @foreach ($mesa->pedidos as $pedido)  

      @if ($pedido->estado==1)
               
      @else
            
            <div class="card text-white bg-success m-2 listapedidos" style="max-width: 38rem;">
              <div class="card-header fs-4"><strong> Nro de Pedido: </strong> <strong class="badge bg-warning text-dark" id="idpedidoconfirmado">{{$pedido->id}}</strong></div>
              <div class="card-body">
                <p class="card-text fs-4" id="fechaconfirmada">{{$pedido->fecha}} </p>  
                @if ($pedido->estado == 0)
                <span class="badge rounded-pill bg-warning text-dark mb-2 p-2 fs-5">En Espera</span>
                @else                            
                <span class="badge rounded-pill bg-primary mb-2 p-2">Atendido</span>     
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
                <div class="col">
                  <button onclick="atendido()" id="botonatendido" type="button" class="btn btn-danger btn-lg">Atendido</button>

                </div>
                <div class="col">
                  <button onclick="aumentarpedido()" type="botonaumentarpedido" class="btn btn-danger btn-lg">Aumentar</button>
               </div>
               </div>       
              </div>
              <hr>
              <h5 class="card-title p-2 fs-3"> <strong> Precio:</strong> <strong id="totalapagarconfirmado"> {{$pedido->totalapagar}} </strong> <strong> s/. </strong> </h5>
          </div>
      @endif
    @endforeach
            
          </div>    
        </div>     

       
                 

    </section>

    <script src="../js/main.js"></script> 
@endsection