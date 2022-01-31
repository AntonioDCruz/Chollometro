<?php

$mytime = Carbon\Carbon::now();
$year = substr($mytime->toDateTimeString(), 0, 4);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CholloSevero</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" type="text/css" >
</head>

<header>
    <nav class="navbar navbar-expand-lg text-white" id="plantillaNav">
        <a class="navbar-brand text-white" href="{{ route('inicio') }}"> <img class="mr-2" src="{{ URL::asset('img/logo.jpg') }}" alt="logo" width="50px"> Chollo ░▒▓ Severo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link text-white" href="{{ route('inicio') }}">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="{{ route('nuevos') }}">Nuevos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('destacados') }}">Destacados</a>
            </li>
          </ul>
          <button class="btn btn-sm" id="btnCrearChollo" onclick="window.location.href='{{ route('creaChollo') }}'">Crear Chollo</button>
        </div>
      </nav>
    @yield('titulo')
</header>


<body class="container text-center">
    
    <main>
        @yield('content')
    </main>

    <footer class="p-2 container-fluid">
        <p class="mt-4">Antonio David Cruz Alarcón</p>
        <p>©CholloSevero {{ $year }}</p>
    </footer>
</body>
</html>