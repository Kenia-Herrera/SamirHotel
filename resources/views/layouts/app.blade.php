<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel </title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/inicio.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/habitaciones.css') }}">
</head>
<body>

    <!-- Incluye el header -->
    @include('partials.header')

    <!-- Contenido principal de la página -->
    <div class="container">
        @yield('content') 
    </div>

    <!-- Incluye el footer -->
    @include('partials.footer')

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
