@extends('layouts.layoutcajero')
@section('content')
<section class="container">

    <div class="row mt-5">
        @foreach ($mesas as $mesa)
        <div class="col">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div class="card-header">{{$mesa->nromesa}}</div>
                <div class="card-body">
                  
                  <p class="card-text">{{$mesa->nrosillas}}</p>
                  @if ($mesa->estado == 1)
                  <p class="badge rounded-pill bg-success">LIBRE</p>
                  @else
                  <p class="badge rounded-pill bg-danger">OCUPADO</p>   
                  @endif
                  <div class="row">
                    <a class="btn btn-success" href="{{route('pedidoscajero', $mesa->id)}}">Cobrar Mesa</a>
                  </div>              
                  
                </div>
              </div>


        </div>
        @endforeach
       

    </div>
      

</section>
@endsection