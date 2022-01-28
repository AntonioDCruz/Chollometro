<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    <title>CholloSevero</title>
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
        <button onclick="window.location.href='{{ route('creaChollo') }}'">Crear Chollo</button>
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