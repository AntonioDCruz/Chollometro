@extends('plantillaChollo')

@section('titulo')
    <h2>Inicio</h2>
@endsection

@section('content')
    @if (session('mensaje'))
        <div class="alert alert-success">{{ session('mensaje')}}</div>
    @endif
        @foreach ($chollos as $chollo)
        <a href="{{ route('vistaChollo', $chollo) }}" class="btn btn-warning btn-sm">
                <div class="border border-dark">
                    <div class="row">
                        <div class="col-4">
                            <img src="{{ asset('public/img/1-chollo-severo.jpg') }}" alt="">
                        </div>
                        <div class="col-8">
                            <h2>{{$chollo -> titulo}}</h2>
                            <p>{{$chollo -> descripcion}}</p>
                            <p>{{$chollo -> url}}</p>
                            <span>{{$chollo -> categoria}}</span>
                            <p>{{$chollo -> puntuacion}}</p>
                            <p>{{$chollo -> precio}}</p>
                            <p>{{$chollo -> precio_descuento}}</p>
                        </div>
                        <a href="{{ route('editaChollo', $chollo) }}" class="btn btn-warning btn-sm">
                            Editar
                        </a>
                        <form action="{{ route('eliminarChollo', $chollo) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                        
                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                        </form>
                    </div>
                </div>
            </a>
        @endforeach
    </table>
@endsection