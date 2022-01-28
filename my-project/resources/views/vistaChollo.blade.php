@extends('plantillaChollo')

@section('content')
    <h1>{{ $chollo -> titulo }}</h1>

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>URL</th>
                <th>Categoría</th>
                <th>Puntuacion</th>
                <th>Precio</th>
                <th>Precio Descuento</th>
            </tr>
        </thead>

        <tr>
            <td>{{$chollo -> titulo}}</td>
            <td>{{$chollo -> descripcion}}</td>
            <td>{{$chollo -> url}}</td>
            <td>{{$chollo -> categoria}}</td>
            <td>{{$chollo -> puntuacion}}</td>
            <td>{{$chollo -> precio}}</td>
            <td>{{$chollo -> precio_descuento}}</td>
        </tr>
    </table>
@endsection