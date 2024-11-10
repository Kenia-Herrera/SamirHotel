@extends('layouts.app')

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <!-- Banner -->
    <section class="banner d-flex justify-content-center align-items-center" style="background-image: url('{{ asset('images/banner.jpg') }}'); height: 60vh;">
        <div class="text-center text-dark" style="color: #004d40; text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.4);">
            <h1>Bienvenidos a Hotel</h1>
            <p>Disfruta de una experiencia inolvidable en nuestro hotel de lujo.</p>
            <a href="{{ route('reservar.opciones') }}" target="_blank" class="btn btn-primary">Reserva Ahora</a>
        </div>
    </section>

    <!-- Sección de Bienvenida -->
    <section class="container my-5">
        <h2 class="text-center">Bienvenidos a Nuestro Hotel</h2>
        <p class="text-center">Nuestro hotel de lujo ofrece un ambiente acogedor y un servicio excepcional para que disfrutes de una estancia inolvidable.</p>
    </section>

    <!-- Servicios Destacados y Amenidades -->
    <section class="container my-5">
        <h2 class="text-center">Servicios Destacados y Amenidades</h2>
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <div class="card">
                    <img src="{{ asset('images/spa.jpg') }}" class="card-img-top" alt="Spa">
                    <div class="card-body">
                        <h5 class="card-title">Spa</h5>
                        <p class="card-text">Relájate en nuestro exclusivo spa.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="card">
                    <img src="{{ asset('images/alb.jpg') }}" class="card-img-top" alt="Piscina">
                    <div class="card-body">
                        <h5 class="card-title">Piscina</h5>
                        <p class="card-text">Disfruta de nuestra piscina al aire libre.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="card">
                    <img src="{{ asset('images/gim.jpg') }}" class="card-img-top" alt="Gimnasio">
                    <div class="card-body">
                        <h5 class="card-title">Gimnasio</h5>
                        <p class="card-text">Mantén tu rutina de ejercicio en nuestro gimnasio.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Opiniones Recientes de Huéspedes -->
    <section class="container my-5">
        <h2 class="text-center">Opiniones Recientes de Huéspedes</h2>
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <blockquote class="blockquote">
                    <p class="mb-0">"Un lugar maravilloso, el servicio fue excelente."</p>
                    <footer class="blockquote-footer">Juan Pérez</footer>
                </blockquote>
            </div>
            <div class="col-md-4 text-center mb-4">
                <blockquote class="blockquote">
                    <p class="mb-0">"La mejor experiencia de vacaciones que hemos tenido."</p>
                    <footer class="blockquote-footer">María García</footer>
                </blockquote>
            </div>
            <div class="col-md-4 text-center mb-4">
                <blockquote class="blockquote">
                    <p class="mb-0">"Definitivamente volveré, un lugar hermoso y acogedor."</p>
                    <footer class="blockquote-footer">Pedro López</footer>
                </blockquote>
            </div>
        </div>
    </section>

    <!-- Ofertas Especiales -->
    <section class="container my-5 bg-light p-4 rounded">
        <h2 class="text-center">Ofertas Especiales</h2>
        <p class="text-center">3 Noches por el Precio de 2</p>
        <p class="text-center">Aprovecha esta oferta para disfrutar más tiempo.</p>
        <p class="text-center">Descuento en Reservas Anticipadas</p>
        <p class="text-center">Reserva con antelación y obtén un 20% de descuento.</p>
    </section>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
