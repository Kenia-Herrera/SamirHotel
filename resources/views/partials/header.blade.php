<header>
  <nav class="navbar navbar-expand-lg">
    <!-- Logo -->
    <a class="navbar-brand" href="#">
      <img src=".png" alt="Logo" class="navbar-logo">
    </a>

    <!-- Botón de colapso para dispositivos móviles -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Enlaces de navegación -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('inicio') }}">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('hotel') }}">Hotel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('habitaciones') }}">Habitaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('servicios') }}">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('galeria') }}">Galería</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contactos') }}">Contáctanos</a>
        </li>
      </ul>

      <!-- Botón de reserva ahora alineado a la derecha -->
      <a href="{{ route('reservar.opciones') }}" target="_blank" class="btn btn-primary ml-auto">Reserva Ahora</a>
    </div>
  </nav>
</header>
