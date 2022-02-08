@extends('plantillaChollo')

@section('content')
    <div class="container bg-white ">
        <div class="row ">
            <div class="col-6 col-sm-12 mt-3 mb-3">
                <img class="" src="{!! asset('img/'.$chollo -> id.'-chollo-severo.jpg') !!}" alt="Imagen Chollo" width="300px">
            </div>
            <div class="col-6 col-sm-12 mt-3 mb-3 text-left">
                <button id="btnPuntuacion" class="btn btn-lg mt-2" disabled>{{$chollo -> puntuacion}}</button>
                <h3 class="text-left mt-3">{{$chollo -> titulo}}</h3>
                <h5 class="text-left">{{$chollo -> categoria}}</h5>
                <h2 id="precio" class="text-left font-weight-bold mt-3">  {{$chollo -> precio_descuento}}€</h2>
                <h3 class="text-secondary text-left"> (<del>{{$chollo -> precio}}</del>)€</h3>  
                <button id="btnIrChollo" onclick="window.location.href='{{$chollo -> url}}'" class="btn btn-primary btn-lg mt-3">Ir al chollo</button>
                <p class="text-left text-secondary mt-3">{{$chollo -> descripcion}}</p>
            </div>
        </div>
        <div class="row bg-light border border-secondary rounded mt-3">
                <p class="text-secondary text-left mt-3 ml-2">Publicado el {{ $chollo -> created_at }}</p>
        </div>
    </div>
@endsection