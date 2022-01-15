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
                                    <select  class="form-select" name="plato" id="nombreplato">
                                      
                                      <option id="optionplato" value="">  </option>
                                     
                                    </select>
                                  </div>
                                  <div class="mb-3">
                                    <label for="cantidad" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidadplato" placeholder="Ingresar la Cantidad para este Pedido">
                                  </div>
                                
                            <button type="button" class="btn-close"  id="botoncerrar" data-bs-dismiss="alert" aria-label="Close"></button>
                            <button id="botonagregarplato" class="btn  btn-primary btn-lg">Agregar Plato</button>
                          </div>    
                          </div>
                         <div id="formbebidas" class="alert alert-warning alert-dismissible fade show" role="alert">
                          <div>     
                          <div class="mb-3">
                                  <label for="bebida" class="form-label">Bebidas</label>
                                  <select  class="form-select" name="bebida" id="nombrebebida">
                                    @foreach ($bebidas as $bebida)
                                    <option value="{{$bebida->id}}">{{$bebida->nombrebebida}} - {{$bebida->tamanio}}</option>
                                    @endforeach
                                     
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="cantidad" class="form-label">Cantidad</label>
                                  <input type="number" class="form-control" id="cantidadbebida" placeholder="Ingresar la Cantidad para este Pedido">
                                </div>
                              
                          <button type="button"  id="botoncerrar" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          <button class="btn  btn-primary btn-lg">Agregar Bebida</button>
                        </div>    
                        </div>
                       <div id="formcomplementos" class="alert alert-warning alert-dismissible fade show" role="alert">
                        <div>
                            <div class="mb-3">
                                <label for="complemento" class="form-label">Complemento</label>
                                <select  class="form-select" name="complemento" id="complemento">
                                  @foreach ($complementos as $complemento)
                                  <option value="{{$complemento->id}}">{{$complemento->nombrecomplemento}} - {{$complemento->tamanio}}</option>
                                  @endforeach
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
                                        <th scope="col">#</th>
                                        <th scope="col">Pedido</th>
                                        <th scope="col">Cantidad</th>
                                        <th scope="col">Precio</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th id="idplato">1</th>
                                        <td id="platotabla"></td>
                                        <td id="cantidadtabla"></td>
                                        <td id="preciotabla"></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">3</th>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                      </tr>
                                    </tbody>
                                  </table>

                            </div>
                    </div>

                </section>
            </div>

                 

    </section>


@endsection