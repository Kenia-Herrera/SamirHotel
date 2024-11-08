<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="#">
    <img src=".png" alt="Logo" class="navbar-logo">
  </a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
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
    
    </form>
  </div>
</nav>
