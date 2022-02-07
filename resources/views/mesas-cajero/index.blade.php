@extends('layouts.layoutcajero')
@section('content')
        <section class="container">
            <div class="row mt-5">
                @foreach ($mesas as $mesa)
                    
                
                <div class="col">
                  <a href="{{route('mesa.show', $mesa->id)}}">
                    <div class="card text-dark bg-light mb-3" style="max-width: 18rem; max-height: 18rem;">
                        <div class="card-header"><h6 class="text-center">{{$mesa->nromesa}}</h6></div>
                        <div class="card-body">
                          <p class="card-title">{{$mesa->nrosillas}}</p>
                          @if ($mesa->estado == 1)
                          <p class="badge rounded-pill bg-success">LIBRE</p>
                          @else
                          <p class="badge rounded-pill bg-danger">OCUPADO</p>   
                          @endif
                        </div>
                        </div>
                      </a>                         
                      </div>
                    
                @endforeach
              </div> 

        </section>
@endsection