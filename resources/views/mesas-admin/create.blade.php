@extends('layouts.layoutadmin')
@section('content')

<section class="d-flex justify-content-center mt-5">
        <h3>CREAR NUEVAS MESAS</h3>
</section>
<section class="mt-4 d-flex justify-content-center">
        <form action="{{route('mesa.store')}}" class="w-50 p-3" method="POST">
        
         @csrf
         @method('POST')       

        <div class="input-group input-group-lg  mb-3">
                <input type="text" name="nromesa" class="form-control" required  placeholder="Escriba el numero de mesa">
        </div>
        
        <div class="input-group input-group-lg mb-3">
                 <input type="text"  name="nrosillas" class="form-control" required placeholder="Numero de sillas de la mesa">
        </div>
        
        <select class="form-select form-select-lg mb-3" name="estado">
                <option value="0">Ocupada</option>
                <option value="1" selected>Libre</option>
        </select>

        <div class="input-group input-group-lg d-flex justify-content-center mb-3">
                <button class="btn btn-primary btn-lg">Crear Mesa</button>
       </div>
              
        </form>      
</section>
        
@endsection