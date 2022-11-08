@extends('app.base')

@section('content')
<div>
    aquí va el contenido de edit, se presenta el formulario con los campos
    que se han de introducir para editar una CANCION
</div>
<div>
    <form action="{{ url('cancion/' . $cancion->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="nombre">titulo</label>
            <input value="{{ old('titulo', $cancion->titulo) }}" required type="text" minlength="3" maxlength="80" class="form-control" id="titulo" name="titulo" placeholder="titulo">
            @error('titulo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="nombre">interprete</label>
            <input value="{{ old('interprete', $cancion->interprete) }}" required type="text" minlength="3" maxlength="100" class="form-control" id="interprete" name="interprete" placeholder="interprete">
            @error('interprete')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="nombre">autor</label>
            <input value="{{ old('autor', $cancion->autor) }}" type="text" maxlength="100" class="form-control" id="autor" name="autor" placeholder="autor">
            @error('autor')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="duracion">Duración</label>
            <input value="{{ old('duracion', $cancion->duracion) }}" type="time" step="1" class="form-control" id="duracion" name="duracion" placeholder="Duración">
            @error('duracion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="nombre">genero</label>
            <input value="{{ old('genero', $cancion->genero) }}" required type="text" minlength="3" maxlength="20" class="form-control" id="genero" name="genero" placeholder="genero">
            @error('genero')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="nombre">album</label>
            <input value="{{ old('album', $cancion->album) }}" type="text" maxlength="70" class="form-control" id="album" name="album" placeholder="album">
            @error('album')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="nombre">orden</label>
            <input value="{{ old('orden', $cancion->orden) }}" type="number" maxlength="6" class="form-control" id="orden" name="orden" placeholder="orden">
            @error('orden')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="nombre">fecha publicacion</label>
            <input value="{{ old('fechapubli', $cancion->fechapubli) }}" required type="date" class="form-control" id="fechapubli" name="fechapubli" placeholder="fecha publicacion">
            @error('fecha publicacion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">edit</button>
        &nbsp;
        <a href="{{ url('cancion') }}" class="btn btn-primary">back</a>
        &nbsp;
        <a href="{{ url('cancion/' . $cancion->id) }}" class="btn btn-primary">view cancion</a>
        &nbsp;
        <button type="submit" form="deleteForm" class="btn btn-primary">delete cancion</button>
    </form>
    &nbsp;
    <form action="{{ url('cancion/' . $cancion->id) }}" method="post" id="deleteForm">
        @csrf
        @method('delete')
    </form>
</div>
@endsection

@section('scripts')
<script src="{{ url('assets/js/bikeedit.js') }}"></script>
@endsection