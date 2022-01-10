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
                            <button type="button" class="btn btn-warning m-2">Platos</button>
                            <button type="button" class="btn btn-warning m-2">Bebidas</button>
                            <button type="button" class="btn btn-warning m-2">Complementos</button>
                        </div>   
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <form action="">
                                <div class="mb-3">
                                    <label for="plato" class="form-label">Plato</label>
                                    <select  class="form-select" name="plato" id="plato">
                                        <option value="value1">Nuestros Platos</option>
                                    </select>
                                  </div>
                                  <div class="mb-3">
                                    <label for="cantidad" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" placeholder="Ingresar la Cantidad para este Pedido">
                                  </div>
                                
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <button class="btn  btn-primary btn-lg">Agregar Pedido</button>
                        </form>
                         </div>
                    </article>

                    <div class="row mt-5">
                            <h2> Lista de Pedidos para la <span class="badge bg-success">{{$mesa->nromesa}}</span></h2> 

                            <div class="col mt-5">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
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