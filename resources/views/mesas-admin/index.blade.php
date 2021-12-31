@extends('layouts.layoutadmin')
@section('content')

<div class="d-flex justify-content-center mt-5">
        <h2>ADMINISTRADOR DE MESAS </h2>
        <div class="m-5">
               <a class="btn btn-primary btn-lg" href="{{route('mesa.create')}}">Crear Mesa</a> 
        </div>
</div>
       
        <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nro Mesa</th>
      <th scope="col">Nro Sillas</th>
      <th scope="col">Disponibilidad</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
          @foreach ($mesas as $mesa)
          <tr>
                <th scope="row">#</th>
                <td>{{$mesa->nromesa}}</td>
                <td>{{$mesa->nrosillas}}</td>
                <td>{{$mesa->estado}}</td>
                <td class="btn-group"> 
                       
                        <a class="btn btn-success" href="{{route('mesa.edit', $mesa->id)}}">EDIT</a>
                        
                        <form action="{{route('mesa.destroy', $mesa->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" href="{{route('mesa.destroy', $mesa->id)}}">DEL</button>
                        </form>
                </td>
              </tr>
          @endforeach 
         
  </tbody>
</table>

<hr class="mt-5 mb-5">
<div class="m-5">
        <h2>NUESTRAS MESAS</h2>
</div>
<section class="container">
        <div class="row align-items-center">
        <div class="col">
                <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
        </div>

        <div class="col">
                <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
        </div>
        </div>
</section>

@endsection