@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pago de Reserva</h1>

    <div class="row">
        <!-- Información de la reserva -->
        <div class="col-md-8">
            <h2>Detalles de la Reserva</h2>
            <p><strong>Fecha de Entrada:</strong> {{ $fechaEntrada }}</p>
            <p><strong>Fecha de Salida:</strong> {{ $fechaSalida }}</p>
            <p><strong>Noches:</strong> {{ $noches }}</p>

            @foreach ($habitaciones as $habitacion)
                <div class="card mb-3">
                    <img src="{{ $habitacion->imagen_url }}" class="card-img-top" alt="Imagen de habitación">
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($habitacion->tipo) }}</h5>
                        <p class="card-text">{{ $habitacion->descripcion }}</p>
                        <p class="card-text"><strong>Precio por noche: </strong>${{ $habitacion->precio }}</p>
                        <p class="card-text"><strong>Total por {{ $noches }} noches: </strong>${{ $habitacion->precio * $noches }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Sección de pago -->
        <div class="col-md-4">
            <h2>Desglose Total</h2>
            <p><strong>Total:</strong> ${{ $total }}</p>
            <!-- Aquí podrías añadir un formulario de pago -->
        </div>
    </div>
</div>
@endsection
