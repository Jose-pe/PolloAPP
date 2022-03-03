@extends('layouts.layoutadmin')
@section('content')
<div class="container">
<section class="d-flex justify-content-center mt-5">
    <h3>MODIFICAR BEBIDA</h3>
</section>
<section class="mt-4 d-flex justify-content-center">
    <form action="{{route('bebida.update', $bebida->id)}}" class="w-50 p-3" method="POST">
    
     @csrf
     @method('PUT')       

    <div class="input-group input-group-lg  mb-3">
            <input type="text"  value="{{$bebida->nombrebebida}}" name="nombrebebida" class="form-control" required  placeholder="Escriba el nombre de la Bebida">
    </div>
    
    <div class="input-group input-group-lg mb-3">
             <input type="text"  value="{{$bebida->tamanio}}" name="tamanio" class="form-control" required placeholder="Tamaño de Bebida, 1/2 Litro , 1/2 Jarra, 1 Jarra, 1 Litro">
    </div>
   
    <div class="input-group input-group-lg mb-3">
        <input type="number" min="0.00" max="10000.00" step="0.01" value="{{$bebida->precio}}" name="precio" class="form-control" required placeholder="Precio de Bebida">
    </div>
        

    <div class="input-group input-group-lg d-flex justify-content-center mb-3">
            <button type="submit" class="btn btn-primary btn-lg">Modificar Bebida</button>
   </div>
          
    </form>      
</section>
</div>   
@endsection