<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Resumen de Reserva</h1>

    <div class="row">
        <!-- Sección de habitaciones (izquierda) -->
        <div class="col-md-8">
        <form id="reservaForm" action="{{ route('reservar.pago') }}" method="POST">
            @csrf
            <input type="hidden" name="fecha_entrada" value="{{ $fechaEntrada }}">
            <input type="hidden" name="fecha_salida" value="{{ $fechaSalida }}">
            <input type="hidden" name="noches" value="{{ $noches }}">

            @foreach ($habitacionesConPrecios as $habitacion)
                <div class="card mb-3">
                    <img src="{{ $habitacion->imagen_url }}" class="card-img-top" alt="Imagen de habitación">
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($habitacion->tipo) }}</h5>
                        <p class="card-text">{{ $habitacion->descripcion }}</p>
                        <p class="card-text"><strong>Precio por noche: </strong>${{ $habitacion->precio }}</p>
                        <p class="card-text"><strong>Total por {{ $noches }} noches: </strong><span id="precio_total_{{ $habitacion->id }}">${{ $habitacion->precio * $noches }}</span></p>

                        <h6>Huéspedes</h6>
                        <div class="input-group mb-3">
                            <button type="button" class="btn btn-secondary" onclick="actualizarHuespedes('{{ $habitacion->id }}', '{{ $habitacion->tipo }}', -1)">-</button>
                            <input type="number" id="num_huespedes_{{ $habitacion->id }}" name="huespedes[{{ $habitacion->id }}]" value="1" min="1" max="{{ $habitacion->num_huespedes }}" readonly class="form-control text-center">
                            <button type="button" class="btn btn-secondary" onclick="actualizarHuespedes('{{ $habitacion->id }}', '{{ $habitacion->tipo }}', 1)">+</button>
                        </div>
                    </div>
                </div>
            @endforeach

            <button type="button" class="btn btn-primary mt-4" onclick="mostrarConfirmacion()">Proceder al Pago</button>
        </form>


        </div>

        <!-- Sección de desglose (derecha) -->
        <div class="col-md-4">
            <div class="sticky-top" style="top: 20px;">
                <h4>Desglose Total</h4>
                <p><strong>Total noches:</strong> {{ $noches }}</p>
                <p><strong>Desglose de precio:</strong> <span id="desglose_precio_total">$0</span></p>
            </div>
        </div>
    </div>
</div>

<!-- Modal de confirmación -->
<div class="modal fade" id="modalConfirmacion" tabindex="-1" aria-labelledby="modalConfirmacionLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalConfirmacionLabel">Confirmación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                ¿Seguro que quieres continuar?      
                Porfavor selecciona el numero de huespedes
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="document.getElementById('reservaForm').submit()">Continuar</button>            </div>
        </div>
    </div>
</div>
<script>
        function actualizarDesglosePrecio() {
            let precioTotalGlobal = 0;
            @foreach ($habitacionesConPrecios as $habitacion)
                habitacionId = {{ $habitacion->id }};
                precioBase = {{ $habitacion->precio }};
                numHuespedes = parseInt(document.getElementById(`num_huespedes_${habitacionId}`).value);
                precioTotal = precioBase;

                // Aplicar cargos adicionales si hay más huéspedes de los permitidos
                if ("{{ $habitacion->tipo }}" === 'Doble' && numHuespedes > 2) {
                    precioTotal += (numHuespedes - 2) * 250;
                } else if ("{{ $habitacion->tipo }}" === 'Suite' && numHuespedes > 4) {
                    precioTotal += (numHuespedes - 4) * 250;
                }

                // Multiplicar el precio total por el número de noches
                precioTotal *= {{ $noches }};
                document.getElementById(`precio_total_${habitacionId}`).textContent = `$${precioTotal}`;
                precioTotalGlobal += precioTotal;
            @endforeach

            document.getElementById('desglose_precio_total').textContent = precioTotalGlobal;
        }

        // Actualiza la cantidad de huéspedes
        window.actualizarHuespedes = function(habitacionId, tipoHabitacion, cambio) {
            const input = document.getElementById(`num_huespedes_${habitacionId}`);
            const maxHuespedes = { 'Simple': 2, 'Doble': 4, 'Suite': 5 }[tipoHabitacion];
            let numHuespedes = parseInt(input.value) + cambio;

            if (numHuespedes > maxHuespedes) {
                numHuespedes = maxHuespedes;
            } else if (numHuespedes < 1) {
                numHuespedes = 1;
            }
            input.value = numHuespedes;
            actualizarDesglosePrecio();
        };

        // Muestra el modal de confirmación
        window.mostrarConfirmacion = function() {
            const modal = new bootstrap.Modal(document.getElementById('modalConfirmacion'));
            modal.show();
        };

        // Inicializa el desglose de precio al cargar la página 
        document.addEventListener("DOMContentLoaded", function() { 
            let precioTotalGlobal = 0;
            @foreach ($habitacionesConPrecios as $habitacion)
                habitacionId = {{ $habitacion->id }};
                precioBase = {{ $habitacion->precio }};
                numHuespedes = parseInt(document.getElementById(`num_huespedes_${habitacionId}`).value);
                precioTotal = precioBase;

                // Aplicar cargos adicionales si hay más huéspedes de los permitidos
                if ("{{ $habitacion->tipo }}" === 'Doble' && numHuespedes > 2) {
                    precioTotal += (numHuespedes - 2) * 250;
                } else if ("{{ $habitacion->tipo }}" === 'Suite' && numHuespedes > 4) {
                    precioTotal += (numHuespedes - 4) * 250;
                }

                // Multiplicar el precio total por el número de noches
                precioTotal *= {{ $noches }};
                document.getElementById(`precio_total_${habitacionId}`).textContent = `$${precioTotal}`;
                precioTotalGlobal += precioTotal;
            @endforeach

            document.getElementById('desglose_precio_total').textContent = precioTotalGlobal;
        });
</script>
@endsection
