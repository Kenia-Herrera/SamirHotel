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
                @php
                    $huespedes = $numHuespedes[$habitacion->id];
                    $precioBase = $habitacion->precio;
                    $costoAdicional = 0;

                    if ($habitacion->tipo === 'Doble' && $huespedes > 2) {
                        $costoAdicional = ($huespedes - 2) * 250;
                    } else if ($habitacion->tipo === 'Suite' && $huespedes > 4) {
                        $costoAdicional = ($huespedes - 4) * 250;
                    }

                    $totalPorNoche = $precioBase + $costoAdicional;
                    $totalPorHabitacion = $totalPorNoche * $noches;
                @endphp

                <div class="card mb-3">
                    <img src="{{ $habitacion->imagen_url }}" class="card-img-top" alt="Imagen de habitación">
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($habitacion->tipo) }}</h5>
                        <p class="card-text">{{ $habitacion->descripcion }}</p>
                        <p class="card-text"><strong>Precio base por noche: </strong>${{ $habitacion->precio }}</p>
                        @if($costoAdicional > 0)
                            <p class="card-text"><strong>Costo adicional por huéspedes extras: </strong>${{ $costoAdicional }}</p>
                        @endif
                        <p class="card-text"><strong>Número de huéspedes: </strong>{{ $huespedes }}</p>
                        <p class="card-text"><strong>Total por {{ $noches }} noches: </strong>${{ $totalPorHabitacion }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Sección de pago -->
        <div class="col-md-4">
            <h2>Registro del Cliente</h2>

            <!-- Formulario de Registro de Cliente -->
            <!-- Formulario de Pago -->
            <form action="{{ route('reservar.confirmarPago') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required>
                </div>

            <h2>Desglose Total</h2>
            <p><strong>Total:</strong> ${{ $total }}</p>

                @csrf
                <input type="hidden" name="fecha_entrada" value="{{ $fechaEntrada }}">
                <input type="hidden" name="fecha_salida" value="{{ $fechaSalida }}">
                <input type="hidden" name="total" value="{{ $total }}">
                @foreach ($habitaciones as $habitacion)
                    <input type="hidden" name="habitaciones[]" value="{{ $habitacion->id }}">
                    <input type="hidden" name="num_huespedes[{{ $habitacion->id }}]" value="{{ $numHuespedes[$habitacion->id] }}">
                @endforeach
                <input type="hidden" name="cliente_id" value="{{ session('cliente_id') }}">
                <button type="submit" class="btn btn-primary mt-4">Pagar y Confirmar Reserva</button>
            </form>
        </div>
    </div>
</div>
@endsection
