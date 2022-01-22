@extends('layouts.layoutcajero')
@section('content')

    <section class="container">

            <div class="row mt-5">
                <h2 class="text-success">{{$mesa->nromesa}}</h2>   
                <article class="col">
                    @if ($mesa->estado == 0)
                    <p class="badge bg-danger"> Ocupado </p>
                    @else  
                    <p class="badge bg-success">Libre </p>  
                    @endif
                   
                    <p>{{$mesa->nrosillas}}</p>
                </article>
                <article class="col mt-5">
                    <div class="btn-group mt-4">
                        @if ($mesa->estado == 0)
                        <button type="button" class="btn btn-success m-2" disabled>Atender Mesa</button>
                        <button type="button" class="btn btn-danger m-2" disabled>Cancelar Atencion</button>

                        @else
                        <button type="button" class="btn btn-success m-2">Atender Mesa</button>
                        <button type="button" class="btn btn-danger m-2">Cancelar Atencion</button>

                        @endif
                        <button type="button" class="btn btn-success m-2">Cobrar Mesa</button>
                    </div>
                </article>
                <section  class="row">
                    <article class="col">
                        <div class="btn-group">
                            <button type="button" id="botonplatos" class="btn btn-warning m-2">Platos</button>
                            <button type="button" id="botonbebidas" class="btn btn-warning m-2">Bebidas</button>
                            <button type="button" id="botoncomplementos" class="btn btn-warning m-2">Complementos</button>
                        </div>   
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
                                    <input type="number" required min="1" max="500" value="1" class="form-control" id="cantidadplato" placeholder="Ingresar la Cantidad para este Pedido">
                                    <div id="alertacantidad" class="alert alert-danger" role="alert">
                                       La cantidad del pedido tiene que ser mayor a 0
                                    </div>
                                  </div>
                                
                            <button type="button" class="btn-close"  id="botoncerrar" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                </div>
                              
                          <button type="button"  id="botoncerrar" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          <button id="botonagregarbebida" disabled class="btn  btn-primary btn-lg">Agregar Bebida</button>
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
                              <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad" placeholder="Ingresar la Cantidad para este Pedido">
                              </div>
                            
                        <button type="button" id="botoncerrar" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <button class="btn  btn-primary btn-lg">Agregar Complemento</button>
                        </div>
                     </div>
                    </article>

                    <div class="row mt-5">
                            <h2> Lista de Pedidos para la <span class="badge bg-success">{{$mesa->nromesa}}</span></h2> 

                            <div class="col mt-5">
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

                                     
                                     
                                     
                                    </tbody>
                                  </table>

                            </div>
                    </div>

                </section>
            </div>

                 

    </section>


@endsection