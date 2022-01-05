@extends('layouts.layoutadmin')
@section('content')

<div class="d-flex justify-content-center mt-5">
    <h2>ADMINISTRADOR DE COMPLEMENTOS </h2>
    <div class="m-5">
           <a class="btn btn-primary btn-lg" href="{{route('complemento.create')}}">Crear Complemento</a> 
    </div>
</div>

<section class="mt-4 d-flex justify-content-center">
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre Complemento</th>
        <th scope="col">Tamaño</th>        
        <th scope="col">Precio</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
            @foreach ($complementos as $complemento)
            <tr>
                  <th scope="row">#</th>
                  <td>{{$complemento->nombrecomplemento}}</td>
                  <td>{{$complemento->tamanio}}</td>                  
                  <td>{{$complemento->precio}} s/. </td>
                  <td class="btn-group"> 
                         
                          <a class="btn btn-success" href="{{route('complemento.edit', $complemento->id)}}">EDIT</a>
                          
                          <form action="{{route('complemento.destroy', $complemento->id)}}" method="POST">
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

@endsection