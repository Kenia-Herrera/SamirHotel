@extends('layouts.app')

@section('content')
<div class="InsertBody">
    <div class="container" id="InsertContainer">
        
        <form action="/habitaciones" method="POST" id="habitacionForm">
            {{ csrf_field() }}

            <label for="tipo">Tipo</label>
            <input id="tipo" name="tipo" class="form-control mb-2" type="text" placeholder="Tipo" required>

            <label for="descripcion">Descripción</label>
            <input id="descripcion" name="descripcion" class="form-control mb-2" type="text" placeholder="Descripción">

            <label for="precio">Precio</label>
            <input id="precio" name="precio" class="form-control mb-2" type="number" step="0.01" placeholder="Precio" required>

            <label for="imagen_url">Imagen URL</label>
            <input id="imagen_url" name="imagen_url" class="form-control mb-2" type="text" placeholder="Imagen URL" required>


            <button type="submit" class="btn btn-primary">Guardar Habitación</button>
        </form>
    </div>
</div>

@if(session('success'))
    <script>
        alert("{{ session('success') }}");
    </script>
@endif

@endsection
