<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <title>PolloApp CAJERO</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{route('inicio')}}">POLLOAPP</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">                    
                      <a class="nav-link">Mesas</a>
                      <a class="nav-link">Para Llevar</a>
                      <a class="nav-link">Pedidos</a>
                      <a class="nav-link">Nuevo Pedido</a>
                      <a class="nav-link"></a>
                    </div>
                  </div>
                </div>
              </nav>
    </header>
    <section class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col"></div>
        </div>

    </section>
    <section>
    @yield('content')
    </section>
 
</body>
</html>