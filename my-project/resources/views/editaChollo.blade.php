@extends('plantillaChollo')

@section('content')
  <h2>Editando el chollo {{ $chollo -> id }}</h2>

  @if (session('mensaje'))
    <div class="alert alert-success">{{ session('mensaje')}}</div>
  @endif

  <form action="{{ route('actualizarChollo', $chollo -> id) }}" method="POST">
    @method('PUT') {{-- Necesitamos cambiar al método PUT para editar --}}
    @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}

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


    <input
        type="text"
        name="titulo"
        class="form-control mb-2"
        value="{{ $chollo -> titulo }}"
        placeholder="Nombre del chollo"
        autofocus
    >
    <input
        type="text"
        name="descripcion"
        placeholder="Descripción del chollo"
        class="form-control mb-2"
        value="{{ $chollo -> descripcion }}"
    >

    <input
        type="text"
        name="url"
        placeholder="URL del chollo"
        class="form-control mb-2"
        value="{{ $chollo -> url }}"
    >

    <input
        type="text"
        name="categoria"
        placeholder="Categoría del chollo"
        class="form-control mb-2"
        value="{{ $chollo -> categoria }}"
    >

    <input
        type="number"
        name="puntuacion"
        placeholder="Puntuacion del chollo"
        class="form-control mb-2"
        value="{{ $chollo -> puntuacion }}"
    >

    <input
        type="numnber"
        name="precio"
        step="0.01"
        placeholder="Precio del chollo"
        class="form-control mb-2"
        value="{{ $chollo -> precio }}"
    >

    <input
        type="number"
        name="precio_descuento"
        step="0.01"
        placeholder="Precio descuento del chollo"
        class="form-control mb-2"
        value="{{ $chollo -> precio_descuento }}"
    >

    <input type="checkbox" name="disponible" class="form-control mb-2" value="1" {{ old('is_featured') ? 'checked="checked"' : '' }}>

    <button class="btn btn-primary btn-block" type="submit">Guardar cambios</button>
  </form>
@endsection