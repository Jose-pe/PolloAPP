@extends('layouts.layoutadmin')
@section('content')
<div class="container">
<div class="d-flex justify-content-center mt-5">
    <h2>ADMINISTRADOR DE BEBIDAS </h2>
    <div class="m-5">
           <a class="btn btn-primary btn-lg" href="{{route('bebida.create')}}">Crear Bebida</a> 
    </div>
</div>

<section class="mt-4 d-flex justify-content-center">
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre Bebida</th>
        <th scope="col">Tamaño</th>        
        <th scope="col">Precio</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
            @foreach ($bebidas as $bebida)
            <tr>
                  <th scope="row">#</th>
                  <td>{{$bebida->nombrebebida}}</td>
                  <td>{{$bebida->tamanio}}</td>                  
                  <td>{{$bebida->precio}} s/. </td>
                  <td class="btn-group"> 
                         
                          <a class="btn btn-success" href="{{route('bebida.edit', $bebida->id )}}">EDIT</a>
                          
                          <form action="{{route('bebida.destroy', $bebida->id)}}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger" href="">DEL</button>
                          </form>
                  </td>
                </tr>
            @endforeach 
           
    </tbody>
  </table>
</section>
</div>
@endsection