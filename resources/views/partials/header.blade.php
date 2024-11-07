<nav class="navbar navbar-expand-lg" style="background-color: #FFE4C4;">
  <a class="navbar-brand" href="#">
  <img src=".png" alt="Logo" style="height: 40px;">
  </a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
      <a class="nav-link" href="{{ route('inicio') }}" style="color: #A0522D;">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('hotel') }}" style="color: #8B4513;">Hotel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('habitaciones') }}" style="color: #8B4513;">Habitaciones</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('servicios') }}" style="color: #8B4513;">Servicios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('galeria') }}" style="color: #8B4513;">Galeria</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contactos') }}" style="color: #8B4513;">Contactanos</a>
      </li>
    </ul>
    <form action="{{ route('reservar') }}" method="get" class="ml-auto" style="display: inline;">
        <button type="submit" class="btn btn-primary" style="background-color: #FF5733; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
            Reserva Ya
        </button>
    </form>
  </div>
</nav>
