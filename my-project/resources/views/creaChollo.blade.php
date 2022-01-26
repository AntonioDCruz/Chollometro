@extends('plantillaChollo')

@if (session('mensaje'))
  <div class="mensaje-chollo-creado">
      {{ session('mensaje') }}
  </div>
@endif

@error('titulo')
    <div class="alert alert-danger">
      No olvides rellenar el titulo
    </div>
@enderror

@error('descripcion')
    <div class="alert alert-danger">
      No olvides rellenar la descripcion
    </div>
@enderror

@error('url')
    <div class="alert alert-danger">
      No olvides rellenar la url
    </div>
@enderror

@error('categoria')
    <div class="alert alert-danger">
      No olvides rellenar la categoria
    </div>
@enderror

@error('puntuacion')
    <div class="alert alert-danger">
      No olvides rellenar la puntuacion
    </div>
@enderror

@error('precio')
    <div class="alert alert-danger">
      No olvides rellenar el precio
    </div>
@enderror

@error('precio_descuento')
    <div class="alert alert-danger">
      No olvides rellenar el precio descuento
    </div>
@enderror

@error('disponible')
    <div class="alert alert-danger">
      No olvides marcar si está disponible
    </div>
@enderror


@section('content')
    <form action="{{ route('chollos.crear') }}" method="POST">
        @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}

        <input type="text" name="titulo" value="{{ old('titulo') }}" placeholder="Nombre del chollo" class="form-control mb-2" autofocus required >
        <input type="text" name="descripcion" value="{{ old('descripcion') }}" placeholder="Descripción del chollo" class="form-control mb-2" required >
        <input type="url" name="url" value="{{ old('url') }}" placeholder="URL del chollo" class="form-control mb-2" required >
        <input type="text" name="categoria"  value="{{ old('categoria') }}" placeholder="Categoria del chollo" class="form-control mb-2" required >
        <input type="number" name="puntuacion"  value="{{ old('puntuacion') }}" placeholder="Puntuacion del chollo" class="form-control mb-2" required >
        <input type="text" name="precio" value="{{ old('precio') }}" placeholder="Precio del chollo" class="form-control mb-2">
        <input type="text" step="0.01" value="{{ old('precio_descuento') }}" name="precio_descuento" placeholder="Precio descuento del chollo" class="form-control mb-2" required >
        <label>Disponible</label>
        <input type="checkbox" name="disponible" class="form-control mb-2" value="1" {{ old('is_featured') ? 'checked="checked"' : '' }}>

        <button class="btn btn-primary btn-block" type="submit">
        Crear nuevo chollo
        </button>
    </form>

@endsection