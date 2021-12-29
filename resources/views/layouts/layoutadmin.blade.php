<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <title>PolloApp - Admin</title>
    
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
                      
                      <a class="nav-link" href="{{route('mesa.index')}}">Mesas</a>
                      <a class="nav-link" href="">Platillos</a>
                      <a class="nav-link" href="">Bebidas</a>
                      <a class="nav-link" href="">Complementos</a>
                      <a class="nav-link" href="{{route('mesa.create')}}">Crear Mesa</a>
                      <a class="nav-link disabled">Crear Cajero</a>
                    </div>
                  </div>
                </div>
              </nav>
           
            
           
            
        </div>
        </nav>
    </header>
    <section class="container">
        @yield('content')
    </section>
    <footer class="footer">
        <p>Footer</p>
    </footer>
    
</body>
</html>