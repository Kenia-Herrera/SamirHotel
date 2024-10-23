@extends('layouts.app')

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <head class="text-black text-center py-5">
        <h1>Bienvenidos a Hotel</h1>
        <p>Disfruta de una experiencia inolvidable en nuestro hotel de lujo.</p>
        
    </head>

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

    <section class="container my-5">
        <h2 class="text-center">Opiniones de nuestros Clientes</h2>
        <blockquote class="blockquote text-center">
            <p class="mb-0">"Una experiencia maravillosa. Las habitaciones son muy cómodas y el servicio es excelente." - Juan P.</p>
        </blockquote>
        <blockquote class="blockquote text-center">
            <p class="mb-0">"El spa es lo mejor del hotel, me encantó la atención del personal." - María L.</p>
        </blockquote>
    </section>

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
