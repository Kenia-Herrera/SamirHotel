@extends('layouts.app')

@section('header')
    @include('partials.header')
@endsection

@section('content')
    <head class="text-black text-center py-5">
        <h1>Acerca de Nosotros</h1>
        <p>Conoce más sobre nuestro hotel, su historia y valores.</p>
    </head>

    <section class="container my-5">
        <h2 class="text-center">Nosotros</h2>
        <div class="text-center">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo del hotel" class="img-fluid mb-3" style="max-width: 150px;">
            <p>Nombre del Hotel</p>
            <p>Breve historia sobre el hotel y su misión en la industria.</p>
        </div>
    </section>

    <section class="container my-5">
    <h2 class="text-center">Testimonios de Huéspedes</h2>

    @foreach($opiniones as $opinion)
        <blockquote class="blockquote text-center">
            <p class="mb-0">"{{ $opinion->comentario }}" - {{ $opinion->calificacion }}</p>
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
