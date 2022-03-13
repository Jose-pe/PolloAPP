@extends('layouts.layoutadmin')

@section('content')
<div class="container mt-5">
   
    <div class="row justify-content-center m-4 ">
      
            <div class="col-6 offset-1">
            <button type="button" class="btn btn-warning">Buscar por Mesa</button>
            <button type="button" class="btn btn-warning">Buscar por Fecha</button>
            <button type="button" class="btn btn-warning">Buscar por Mesero</button>
          </div>

          <div id="buscarpormesa" class="row justify-content-center mt-4">
          <div class="col-6">
            <div class="row">
              <div class="input-group">
                <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                  <option selected>Choose...</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
                  <option value="3">Three</option>
                </select>
                <button class="btn btn-outline-success" type="button">Buscar</button>
              </div>
          </div>
          </div>
          </div>

          <div id="buscarporfecha" class="row justify-content-center mt-4">
            <div class="col-6">
              <div class="row">
                <div class="input-group">
                  <input type="date" class="form-control"  aria-describedby="button-addon2">
                  <button class="btn btn-outline-success" type="button" id="button-addon2">Buscar</button>
                </div>
            </div>
            </div>
            </div>

            <div id="buscarpormesero" class="row justify-content-center mt-4">
              <div class="col-6">
                <div class="row">
                  <div class="input-group">
                    <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                      <option selected>Choose...</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    <button class="btn btn-outline-success" type="button">Buscar</button>
                  </div>
              </div>
              </div>
              </div>
   
    </div>
  
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
        <tbody>
        
          
          @foreach ($pedidos as $pedido)  
             
              <tr>            
                <th scope="row">{{$pedido->id}}</th>
                <td>{{$pedido->fecha}}</td>                       
                <td>{{$pedido->estado}}</td>               
                <td>{{$pedido->totalapagar}} S/.</td>
                <td><a class="btn btn-success"> VER </a></td>
              </tr>
                 
       
              
          @endforeach

         
        </tbody>
      </table>
@endsection