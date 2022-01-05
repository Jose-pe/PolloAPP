@extends('layouts.layoutadmin')
@section('content')

<section class="d-flex justify-content-center mt-5">
    <h3>CREAR NUEVO COMPLEMENTO</h3>
</section>
<section class="mt-4 d-flex justify-content-center">
    <form action="{{route('complemento.store')}}" class="w-50 p-3" method="POST">
    
     @csrf
     @method('POST')       

    <div class="input-group input-group-lg  mb-3">
            <input type="text" name="nombrecomplemento" class="form-control" required  placeholder="Escriba el nombre del complemento">
    </div>
    
    <div class="input-group input-group-lg mb-3">
             <input type="text"  name="tamanio" class="form-control" required placeholder="Tamaño de Complemento. ejm: 1/2 porcion, 1 porcion">
    </div>
   
    <div class="input-group input-group-lg mb-3">
        <input type="number" min="0.00" max="10000.00" step="0.01"  name="precio" class="form-control" required placeholder="Precio de Complemento">
    </div>
        

    <div class="input-group input-group-lg d-flex justify-content-center mb-3">
            <button type="submit" class="btn btn-primary btn-lg">Crear Complemento</button>
   </div>
          
    </form>      
</section>
    
@endsection