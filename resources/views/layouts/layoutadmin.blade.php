<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="../css/main.css" rel="stylesheet">
    <title>PolloApp - Admin</title>
    
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
           
                <div class="container-fluid">
                  <a class="navbar-brand">POLLOAPP</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                      
                      <a class="nav-link" href="{{route('mesa.index')}}">Mesas</a>
                      <a class="nav-link" href="{{route('platillo.index')}}">Platillos</a>
                      <a class="nav-link" href="{{route('bebida.index')}}">Bebidas</a>
                      <a class="nav-link" href="{{route('complemento.index')}}">Complementos</a>
                      
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('registrartrabajador') }}">Registrar Empleado</a>
                                </li>
                       
                      <a  href="{{route('pedidoscobrados')}}" class="nav-link">Pedidos Atendidos</a>
                      <a class="nav-link">Ver Reportes</a>
                      <a class="nav-link">Ver Boletas</a>
                      <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-success" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    </div>
                  </div>
                </div>
         
           
            
           
            
        </div>
        </nav>
    </header>
    <section class="container-fluid">
        @yield('content')
    </section>
    <footer class="footer">
        <p>Footer</p>
    </footer>
    
</body>
</html>