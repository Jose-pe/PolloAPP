@extends('layouts.layoutadmin')
@section('content')

<section class="d-flex justify-content-center mt-5">
    <h3>CREAR NUEVA BEBIDA</h3>
</section>
<section class="mt-4 d-flex justify-content-center">
    <form action="{{route('bebida.store')}}" class="w-50 p-3" method="POST">
    
     @csrf
     @method('POST')       

    <div class="input-group input-group-lg  mb-3">
            <input type="text" name="nombrebebida" class="form-control" required  placeholder="Escriba el nombre de la Bebida">
    </div>
    
    <div class="input-group input-group-lg mb-3">
             <input type="text"  name="tamanio" class="form-control" required placeholder="Tamaño de Bebida, 1/2 Litro , 1/2 Jarra, 1 Jarra, 1 Litro">
    </div>
   
    <div class="input-group input-group-lg mb-3">
        <input type="number" min="0.00" max="10000.00" step="0.01"  name="precio" class="form-control" required placeholder="Precio de Bebida">
    </div>
        

    <div class="input-group input-group-lg d-flex justify-content-center mb-3">
            <button type="submit" class="btn btn-primary btn-lg">Crear Bebida</button>
   </div>
          
    </form>      
</section>
    
@endsection