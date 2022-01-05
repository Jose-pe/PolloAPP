@extends('layouts.layoutadmin')
@section('content')

<section class="d-flex justify-content-center mt-5">
    <h3>MODIFICAR COMPLEMENTO</h3>
</section>
<section class="mt-4 d-flex justify-content-center">
    <form action="{{route('complemento.update', $complemento->id)}}" class="w-50 p-3" method="POST">
    
     @csrf
     @method('PUT')       

    <div class="input-group input-group-lg  mb-3">
            <input type="text" value="{{$complemento->nombrecomplemento}}" name="nombrecomplemento" class="form-control" required  placeholder="Escriba el nombre del complemento">
    </div>
    
    <div class="input-group input-group-lg mb-3">
             <input type="text" value="{{$complemento->tamanio}}" name="tamanio" class="form-control" required placeholder="Tamaño de Complemento. ejm: 1/2 porcion, 1 porcion">
    </div>
   
    <div class="input-group input-group-lg mb-3">
        <input type="number" min="0.00" max="10000.00" step="0.01" value="{{$complemento->precio}}"  name="precio" class="form-control" required placeholder="Precio de Complemento">
    </div>
        

    <div class="input-group input-group-lg d-flex justify-content-center mb-3">
            <button type="submit" class="btn btn-primary btn-lg">Modificar Complemento</button>
   </div>
          
    </form>      
</section>
    
@endsection