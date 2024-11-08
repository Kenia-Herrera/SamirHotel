@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-5">Servicios</h2>
    <div class="row">
        @foreach($servicios as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ $item->imagen_url }}" class="card-img-top" alt="{{ $item->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->nombre }}</h5>
                        <p class="card-text">{{ $item->descripcion }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
