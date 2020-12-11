<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
	<title>Moligol</title>
	<meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @yield('enlace')
    <script src="Chart.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- Bootstrap -->

    <link rel="stylesheet" href="css/plantilla.css">

</head>
<body>

	<div class="container mt-4">

		<header>
            <nav class="navbar navbar-expand navbar-light bg-light">
                    
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <div class="col-3">
                        <a class="navbar-brand" href="{{route ('inicio') }}"><img src="logo.svg" alt="" width="50" height="50"><span class="moligol">MOLIGOL</span></a>
                    </div>
                    <div class="col-3 nombreUsuario">
                        Bienvenido, {{Auth::user()->name}}
                    </div>
                    <div class="col-3"><a onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" href="{{route('logout')}}"><img class="float-right" width="33" height="33" src="img/cerrar.png" alt=""></a></div>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <div class="col-3">
                        <a href="{{route('carrito')}}">
                            <img class="float-right" width="33" height="33" src="https://images.vexels.com/media/users/3/132104/isolated/preview/5f2ebb95984bf47ea01319291eb81f68-icono-de-silueta-de-carrito-de-compras-by-vexels.png" alt="">
                        </a>
                    </div>
                </div>
            </nav>
        </header>

        <div class="row"> 
                
                <!-- <div class="col-2 text-white mt-4">
                        <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-info"><a href="{{route ('bota.todas') }}"> Ver Todas</a></li>
                                <li class="list-group-item list-group-item-info"><a href="{{route ('usuario.crud') }}"> Crud Usuario</a></li>
                                <li class="list-group-item list-group-item-info"><a href="{{route ('inicio')}}"> Próximas botas</a></li>
                        </ul>
                </div> --> 
                
		
                @yield('contenido')
        
        </div>
		
	</div>

</body>
</html>

@yield('script')