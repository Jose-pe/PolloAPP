@extends('layouts.layoutadmin')
@section('content')
<div class="container">
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
                <td>  @if ($mesa->estado == 1)
                        <p class="badge rounded-pill bg-success">LIBRE</p>
                        @else
                        <p class="badge rounded-pill bg-danger">OCUPADO</p>   
                        @endif</td>
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
        @foreach ($mesas as $mesa )
        <div class="col">
                <div class="card mesa mt-5" style="width: 15rem; height: 15rem;">
                        
                        <div class="card-body mt-4">
                                <h5>{{$mesa->nromesa}}</h5>
                                <p class="card-text">{{$mesa->nrosillas}} <i>iconosilla</i> </p>
                                @if ($mesa->estado == 1)
                                <p class="badge rounded-pill bg-success">LIBRE</p>
                                @else
                                <p class="badge rounded-pill bg-danger">OCUPADO</p>   
                                @endif
                                
                            

                        </div>
                      </div>
        </div>

       @endforeach
        
      
      
       </div>
</section>
</div>
@endsection