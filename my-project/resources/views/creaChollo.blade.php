@extends('plantillaChollo')

@section('content')
    <form action="{{ route('chollos.crear') }}" method="POST">
        @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}

        <input type="text" name="titulo" placeholder="Nombre del chollo" class="form-control mb-2" autofocus>
        <input type="text" name="descripcion" placeholder="Descripción del chollo" class="form-control mb-2">
        <input type="url" name="url" placeholder="URL del chollo" class="form-control mb-2">
        <input type="text" name="categoria" placeholder="Categoria del chollo" class="form-control mb-2">
        <input type="number" name="puntuacion" placeholder="Puntuacion del chollo" class="form-control mb-2">
        <input type="text" name="precio" placeholder="Precio del chollo" class="form-control mb-2">
        <input type="text" name="precio_descuento" placeholder="Precio descuento del chollo" class="form-control mb-2">
        <input type="text" name="disponible" placeholder="Disponibilidad del chollo" class="form-control mb-2">

        <button class="btn btn-primary btn-block" type="submit">
        Crear nueva nota
        </button>
    </form>

@endsection