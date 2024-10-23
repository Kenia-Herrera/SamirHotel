<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Pago</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @if(session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form action="/pago" method="POST">
        @csrf
        <h2>Detalles del Pago</h2>
        <label for="costoPorNoche">Costo por Noche:</label>
        <input type="text" id="costoPorNoche" name="costoPorNoche" value="{{ session('costoPorNoche') }}" readonly>

        <h2>Datos del Cliente (por Habitación):</h2>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" required>

        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Pagar</button>
    </form>
</body>
</html>
