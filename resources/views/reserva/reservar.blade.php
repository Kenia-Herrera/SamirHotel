<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    @if(session('status'))
        <p>{{ session('status') }}</p>
    @endif

    <form action="/reservar" method="POST">
        @csrf
        <label for="fechaInicio">Fecha de Inicio:</label>
        <input type="date" id="fechaInicio" name="fechaInicio" required>

        <label for="fechaSalida">Fecha de Salida:</label>
        <input type="date" id="fechaSalida" name="fechaSalida" required>

        <label for="numHabitaciones">Número de Habitaciones:</label>
        <select id="numHabitaciones" name="numHabitaciones" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>

        <label for="numAdultos">Adultos:</label>
        <select id="numAdultos" name="numAdultos" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>

        <label for="numNinos">Niños:</label>
        <select id="numNinos" name="numNinos">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>

        <button type="submit">Consultar Disponibilidad</button>
    </form>
</body>
</html>
