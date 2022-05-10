@extends('layouts.layoutadmin')

@section('content')
        <section class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-4 offset-1 mb-4">
                    <button type="button" id="botonporcajero" class="btn btn-warning">Buscar por Cajero</button>
                    <button type="button" id="botonporfecha" class="btn btn-warning">Buscar por Fecha</button>
                  </div>
                  <div  id="buscarporcajero" class="row justify-content-center mt-4">
                    <div class="col-6">
                      <div class="row">
                        <div class="input-group">
                          <select class="form-select" id="selectcajero">
                               <option selected value="">Seleccione Cajero</option>              
                          </select>
                        </div>
                    </div>
                    </div>
                    </div>
                    <div id="buscarporfecha" class="row justify-content-center mt-4">
                        <div class="col-6">
                          <div class="row">
                            <div class="input-group">
                                <input type="date" class="form-control" id="selectfecha" aria-describedby="button-addon2">
                            </div>
                        </div>
                        </div>
                        </div>
            </div>
            <div class="row mt-2">
                <h2 class="text-success" id="subtituloboleta">Boletas Cobradas</h2>
                
            </div>
            <div class="row mt-4">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>  
                        <th scope="col">Nro Boleta</th>
                        <th scope="col">Fecha</th>                         
                        <th scope="col">Total</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody id="tablaboletas">
            
                      
                     
            
                     
                    </tbody>
                  </table>
            
            </div>
        </section>
        <script src="../js/boleta.js"></script> 
@endsection