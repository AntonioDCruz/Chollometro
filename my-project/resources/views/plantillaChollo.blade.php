<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title>CholloSevero</title>
</head>
<body class="container text-center">
    <h1 class="">Chollo ░▒▓ Severo</h1>
    <hr>
    <nav>
        <a href="{{ route('inicio') }}">Inicio</a> | 
        <a href="{{ route('nuevos') }}">Nuevos</a> | 
        <a href="{{ route('destacados') }}">Destacados</a> 
    </nav>

    <header>
        @yield('titulo')
    </header>

    <div>
        <button onclick="window.location.href='{{ routte('CreaChollo') }}'">Crear Chollo</button>
        <button onclick="window.location.href='{{ routte('EditaChollo') }}'">Editar Chollo</button>
    </div>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Antonio David Cruz Alarcón</p>
        <p>©CholloSevero</p>
    </footer>
</body>
</html>