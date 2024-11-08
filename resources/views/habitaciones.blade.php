@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-5">Habitaciones</h2>
    <div class="row">
        @foreach($habitaciones as $habitacion) 
        <div class="col-md-4 mb-4">
            <div class="card">
                <!-- Usa la URL de la imagen almacenada -->
                <img src="{{ $habitacion->imagen_url }}" class="card-img-top" alt="{{ $habitacion->tipo }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $habitacion->tipo }}</h5>
                    <p class="card-text">{{ $habitacion->descripcion }}</p>
                    <p class="card-text"><strong>Precio: </strong>${{ number_format($habitacion->precio, 2) }}</p>
                    <a href="#" class="btn btn-primary">Más detalles</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection