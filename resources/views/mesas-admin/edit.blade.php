@extends('layouts.layoutadmin')
@section('content')
<div class="container">
<section class="d-flex justify-content-center mt-5">
    <h3>MODIFICAR MESA</h3>
</section>
<section class="mt-4 d-flex justify-content-center">
    <form action="{{route('mesa.update', $mesa->id)}}" class="w-50 p-3" method="POST">
    
     @csrf
     @method('PUT')       

    <div class="input-group input-group-lg  mb-3">
            <input type="text" value="{{$mesa->nromesa}}" name="nromesa" class="form-control" required  placeholder="Escriba el numero de mesa">
    </div>
    
    <div class="input-group input-group-lg mb-3">
             <input type="number" value="{{$mesa->nrosillas}}" name="nrosillas" class="form-control" required placeholder="Numero de sillas de la mesa">
    </div>
    
    <select class="form-select form-select-lg mb-3" required name="estado">
            <option value="0">Ocupada</option>
            <option value="1" selected>Libre</option>
    </select>

    <div class="input-group input-group-lg d-flex justify-content-center mb-3">
            <button type="submit"  class="btn btn-primary btn-lg">Modificar Mesa</button>
   </div>
          
    </form>      
</section>
</div>        

@endsection