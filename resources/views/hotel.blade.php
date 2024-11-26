@extends('layouts.app')

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <head class="text-black text-center py-5">
        <h1>Acerca de Nosotros</h1>
        <p>Conoce más sobre nuestro hotel, su historia y valores.</p>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    </head>

    <section class="container my-5">
        <h2 class="text-center">Nosotros</h2>
        <div class="text-center">
            <img src="{{ asset('images/OIG4.png') }}" alt="Logo del hotel" class="img-fluid mb-3" style="max-width: 150px;">
            <p>Hotel</p>
            <p>La misión de nuestro hotel en la industria turística y de hospitalidad es proporcionar a los huéspedes una experiencia única y cómoda, brindando un lugar seguro y relajante para descansar y disfrutar durante su estancia. Esto incluye ofrecer un servicio de alta calidad, instalaciones modernas, y atención al cliente excepcional.</p>
        </div>
    </section>

    <section class="container my-5">
    <h2 class="text-center">Testimonios de Huéspedes</h2>

    @foreach($opiniones as $opinion)
        <blockquote class="blockquote text-center">
            <p class="mb-0">"{{ $opinion->comentario }}"</p>

            <!-- Mostrar estrellas según la calificación -->
            <div class="stars">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $opinion->calificacion)
                        <i class="fas fa-star"></i> <!-- Estrella llena -->
                    @else
                        <i class="far fa-star"></i> <!-- Estrella vacía -->
                    @endif
                @endfor
            </div>
        </blockquote>
    @endforeach
</section>


    <section class="container my-5">
        <h2 class="text-center">Formulario de Calificación</h2>
        <form action="{{ route('submitReview') }}" method="POST" class="text-center">
            @csrf
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="form-group my-3">
                <input type="number" name="rating" class="form-control" placeholder="Calificación (1-5)" min="1" max="5" required>
            </div>
            <div class="form-group">
                <textarea name="comment" class="form-control" placeholder="Comentario" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary my-3">Enviar Calificación</button>
        </form>
    </section>
@endsection

@section('footer')
    @include('partials.footer')
@endsection
