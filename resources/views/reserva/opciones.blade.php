<!-- Incluye el CSS y JS de Flatpickr desde el CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Selecciona tus Fechas</h1>
    <form action="{{ route('reservar.disponibles') }}" method="POST">
        @csrf
        <label for="fecha_rango">Seleccione fechas de entrada y salida</label>
            <input type="text" id="fecha_rango" class="form-control" placeholder="Selecciona el rango de fechas" required>
            <input type="hidden" name="fecha_entrada" id="fecha_entrada">
            <input type="hidden" name="fecha_salida" id="fecha_salida">
        <button type="submit" class="btn btn-primary">Buscar Habitaciones Disponibles</button>
    </form>

    @if(isset($habitacionesDisponibles))
        <h2>Habitaciones Disponibles</h2>
        <form action="{{ route('reservar.resumen') }}" method="POST" id="form-seleccion-habitaciones">
            @csrf
            <input type="hidden" name="fecha_entrada" value="{{ $fechaEntrada }}">
            <input type="hidden" name="fecha_salida" value="{{ $fechaSalida }}">

            @foreach ($habitacionesDisponibles as $habitacion)
                <div class="card mb-3">
                    <img src="{{ $habitacion->imagen_url }}" class="card-img-top" alt="Imagen de habitación">
                    <div class="card-body">
                        <h5 class="card-title">{{ ucfirst($habitacion->tipo) }}</h5>
                        <p class="card-text">{{ $habitacion->descripcion }}</p>
                        <p class="card-text"><strong>Precio: </strong>${{ $habitacion->precio }} por noche</p>
                        <button type="button" class="btn btn-secondary agregar-habitacion" data-id="{{ $habitacion->id }}">
                            Agregar
                        </button>
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary mt-3">Continuar a Resumen</button>
        </form>
    @endif
</div>

<!-- Flatpickr JS desde el CDN -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    // Configuración de Flatpickr
    flatpickr("#fecha_rango", {
        mode: "range",
        minDate: "today",
        dateFormat: "Y-m-d",
        onChange: function(selectedDates, dateStr, instance) {
            // Asignar las fechas de entrada y salida a los inputs ocultos
            if (selectedDates.length === 2) {
                document.getElementById('fecha_entrada').value = selectedDates[0].toISOString().slice(0, 10);
                document.getElementById('fecha_salida').value = selectedDates[1].toISOString().slice(0, 10);
            }
        }
    });
     // Script para manejar la selección de habitaciones
     const habitacionesSeleccionadas = new Set();

    document.querySelectorAll('.agregar-habitacion').forEach(button => {
    button.addEventListener('click', function () {
        const habitacionId = this.getAttribute('data-id');

        if (!habitacionesSeleccionadas.has(habitacionId)) {
            habitacionesSeleccionadas.add(habitacionId);
            
            // Crear un input oculto para enviar la habitación seleccionada
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'habitaciones[]';
            input.value = habitacionId;
            document.getElementById('form-seleccion-habitaciones').appendChild(input);

            // Deshabilitar el botón y cambiar el texto
            this.disabled = true;
            this.classList.add('btn-secondary');
            this.classList.remove('btn-primary');
            this.innerText = 'Seleccionado';
        }
    });
});
</script>
@endsection
