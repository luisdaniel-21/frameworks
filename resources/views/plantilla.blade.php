<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <title>Elecciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/844dec5863.js" crossorigin="anonymous"></script>

    

</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://www.google.com/jsapi"></script>


    <header >

    <div id="header">
			<ul class="nav">

				<li><a href="">Candidato</a>
					    <ul>
						    <li><a href="{{ asset('candidato') }}">Listar</a></li>
						    <li><a href="{{ asset('candidato/create') }}">Agregar</a></li>
				</li>
					    </ul>
				</li>
				<li><a href="">Casilla</a>
					<ul>
						<li><a href="{{ asset('casilla') }}">Listar</a></li>
						<li><a href="{{ asset('casilla/create') }}">Agregar</a></li>
                        <li><a target="_blank" href="{{ asset('casilla/pdf') }}">Generar PDF</a></li>
					</ul>
				</li>

                <li><a href="">Eleccion</a>
					<ul>
						<li><a href="{{ asset('eleccion') }}">Listar</a></li>
						<li><a href="{{ asset('eleccion/create') }}">Agregar</a></li>
					</ul>
				</li>

                <li><a href="">Voto</a>
					<ul>
						<li><a href="{{ asset('voto') }}">Listar</a></li>
						<li><a href="{{ asset('voto/create') }}">Agregar</a></li>
					</ul>
				</li>

                <li><a href="{{ asset('logout') }}">Cerrar Sesion</a></li>
				
			</ul>
	</div>

       

        <div class="row">
            <div class="col-md-2">
           
              
            </div>
            <div class="col-md-8 text-center">
                <h1>Instituto Tecnológico del Valle de Oaxaca</h1>
                <h5>Elección de la reina ITVO</h5>
            </div>
            <div class="col-md-2">

            </div>
        </div>

    </header>
    <div class="container">
        @yield('content')
    </div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>