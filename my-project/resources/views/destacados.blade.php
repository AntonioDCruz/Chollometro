@extends('plantillaChollo')

@section('titulo')
    <h2>Chollos Destacados</h2>
@endsection


@section('content')
    @if (session('mensaje'))
        <div class="alert alert-success">{{ session('mensaje')}}</div>
    @endif
        @foreach ($chollos as $chollo)
        <a class="text-dark text-decoration-none" href="{{ route('vistaChollo', $chollo) }}">
            <div class="mt-4 mb-4 rounded bg-white">
                    <div class="row m-2">
                        <div class="col-md-2 justify-content-center mt-3 ml-3 mb-2">
                            <!--Imagen -->
                            <img class="" src="{!! asset('img/'.$chollo -> id.'-chollo-severo.jpg') !!}" alt="Imagen Chollo">
                        </div>
                        <div class="col-md-9 ml-auto text-left mt-4 mb-3">
                            <button class="btn btn-outline-warning btn-primary btn-lg mt-2" disabled>{{$chollo -> puntuacion}}</button>
                            <h5>{{$chollo -> titulo}}</h5>
                            <p class="text-truncate text-secondary">{{$chollo -> descripcion}}</p>
                            <p>{{$chollo -> url}}</p>
                            <p>{{$chollo -> categoria}}</p>
                            <span class="text-danger"> <del>{{$chollo -> precio}}</del>€</span>  <span class="text-success">  {{$chollo -> precio_descuento}}€</span>
        </a>
                            <div class="row justify-content-end">
                                <button id="btnEditar" onclick="window.location.href='{{ route('editaChollo', $chollo) }}'" class="btn btn-sm mr-3">Editar</button>
                                <form action="{{ route('eliminarChollo', $chollo) }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </table>
@endsection