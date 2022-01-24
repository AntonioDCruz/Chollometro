<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
</head>
<body>
    <h1>Chollo ░▒▓ Severo</h1>
    <hr>
    <nav>
        <a href="{{ route('inicio') }}">Inicio</a> | 
        <a href="{{ route('nuevos') }}">Nuevos</a> | 
        <a href="{{ route('destacados') }}">Destacados</a> 
    </nav>

    <header>
        @yield('titulo')
    </header>

    <footer>
        <p>Antonio David Cruz Alarcón</p>
        <p>©CholloSevero</p>
    </footer>
</body>
</html>