@extends('layouts.layoutadmin')
@section('content')
<div class="container">
<section class="d-flex justify-content-center mt-5">
    <h3>MODIFICAR PLATILLOS</h3>
</section>
<section class="mt-4 d-flex justify-content-center">
    <form action="{{route('platillo.update', $platillo->id)}}" class="w-50 p-3" method="Post">
    
     @csrf
     @method('PUT')       

    <div class="input-group input-group-lg  mb-3">
            <input type="text" value="{{$platillo->nombreplatillo}}" name="nombreplatillo" class="form-control" required  placeholder="Escriba el nombre del plato">
    </div>
    
    <div class="input-group input-group-lg mb-3">
             <input type="text" value="{{$platillo->tamanio}}" name="tamanio" class="form-control" required placeholder="Tamaño del plato, ejem: 1/8 , 1/2 plato">
    </div>
    <div class="input-group input-group-lg mb-3">
        <input type="text"  name="descripcion" value="{{$platillo->descripcion}}" class="form-control" required placeholder="Corta descripcion del plato">
    </div>
    <div class="input-group input-group-lg mb-3">
        <input type="number" min="0.00" max="10000.00" step="0.01" value="{{$platillo->precio}}" name="precio" class="form-control" required placeholder="Precio del Plato">
    </div>
        

    <div class="input-group input-group-lg d-flex justify-content-center mb-3">
            <button type="submit" class="btn btn-primary btn-lg">Modificar Platillos</button>
   </div>
          
    </form>      
</section>
</div>
@endsection