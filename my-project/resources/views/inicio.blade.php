@extends('plantillaChollo')

@section('titulo')
    <h2>Inicio</h2>
@endsection

@section('content')
    <table border="1">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>URL</th>
                <th>Categoria</th>
                <th>Puntuacio</th>
                <th>Precio</th>
                <th>Precio Descuento</th>
                <th>Disponible</th>
            </tr>
        </thead>

        @foreach ($chollos as $chollo)
            <tr>
                <td>{{$chollo -> titulo}}</td>
                <td>{{$chollo -> descripcion}}</td>
                <td>{{$chollo -> url}}</td>
                <td>{{$chollo -> categoria}}</td>
                <td>{{$chollo -> puntuacion}}</td>
                <td>{{$chollo -> precio}}</td>
                <td>{{$chollo -> precio_descuento}}</td>
                <td>{{$chollo -> disponible}}</td>
            </tr>
        @endforeach
    </table>
@endsection