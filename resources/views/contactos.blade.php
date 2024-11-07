@extends('layouts.app')

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <head class="text-black text-center py-5">
        <h1>Contáctanos</h1>
        <p>Estamos aquí para ayudarte con cualquier consulta.</p>
    </head>

    <section class="container my-5">
        <h2 class="text-center">Formulario de Contacto</h2>
        <form action="{{ route('submitContact') }}" method="POST" class="text-center">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="form-group my-3">
                <input type="email" name="email" class="form-control" placeholder="Correo Electrónico" required>
            </div>
            <div class="form-group my-3">
                <input type="text" name="subject" class="form-control" placeholder="Asunto" required>
            </div>
            <div class="form-group">
                <textarea name="message" class="form-control" placeholder="Mensaje" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary my-3">Enviar Mensaje</button>
        </form>
    </section>

    <section class="container my-5">
        <h2 class="text-center">Información de Contacto</h2>
        <p class="text-center">Dirección: 123 Calle Ficticia, Ciudad, País</p>
        <p class="text-center">Teléfono: +123 456 7890</p>
        <p class="text-center">Correo Electrónico: info@hotel.com</p>
    </section>

    <section class="container my-5">
        <h2 class="text-center">Ubicación</h2>
        <div class="text-center">
            <!-- Insertar mapa de Google Maps -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.9542653457515!2d-122.08424968469062!3d37.42199977982533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb0a6c0b2c1a7%3A0x4d37d144c8f92f4e!2sGoogleplex!5e0!3m2!1sen!2sus!4v1616199432954!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>
@endsection

@section('footer')
    @include('partials.footer')
@endsection

