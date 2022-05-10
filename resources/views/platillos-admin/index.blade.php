@extends('layouts.layoutadmin')
@section('content')
<div class="container-fluid">
<div class="d-flex justify-content-center mt-5">
    <h2>ADMINISTRADOR DE PLATILLOS </h2>
    <div class="m-5">
           <a class="btn btn-primary btn-lg" href="{{route('platillo.create')}}">Crear Platillo</a> 
    </div>
</div>

<section class="mt-4 d-flex justify-content-center">
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre Platillo</th>
        <th scope="col">Tamaño</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Precio</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
            @foreach ($platillos as $platillo)
            <tr>
                  <th scope="row">#</th>
                  <td>{{$platillo->nombreplatillo}}</td>
                  <td>{{$platillo->tamanio}}</td>
                  <td>{{$platillo->descripcion}}</td>
                  <td>{{$platillo->precio}} s/.</td>
                  <td class="btn-group"> 
                         
                          <a class="btn btn-success" href="{{route('platillo.edit', $platillo->id)}}">EDIT</a>
                          
                          <form action="{{route('platillo.destroy', $platillo->id)}}" method="POST">
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