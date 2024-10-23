<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opciones de Alojamiento</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @if(session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form action="/opciones" method="POST">
        @csrf
        <h2>Combinaciones de Habitaciones Disponibles:</h2>
        @foreach($habitacionesDisponibles as $habitacion)
            <div class="habitacion-opcion">
                <input type="checkbox" id="habitacion{{ $habitacion->id }}" name="habitacionSeleccionada[]" value="{{ $habitacion->id }}">
                <label for="habitacion{{ $habitacion->id }}">
                    <h3>{{ $habitacion->tipo }}</h3>
                    <p>{{ $habitacion->descripcion }}</p>
                    <p>Precio por noche: ${{ $habitacion->precio }}</p>
                    <p>Disponible desde: {{ $habitacion->fecha_entrada }} hasta {{ $habitacion->fecha_salida }}</p>
                </label>
            </div>
        @endforeach

        <h2>Datos del Viaje:</h2>
        <label for="noches">Noches:</label>
        <input type="number" id="noches" name="noches" value="{{ old('noches', 1) }}" required>

        <h2>Precio Desglosado:</h2>
        <!-- Aquí se mostrarán los detalles del precio -->
        <div id="detallesPrecio">
            <!-- Ejemplo de detalle de precio -->
            <p>Precio por noche: ${{ session('costoPorNoche') }}</p>
            <p>Total: ${{ session('costoPorNoche') * old('noches', 1) }}</p>
        </div>

        <button type="submit">Reservar</button>
    </form>
</body>
</html>
