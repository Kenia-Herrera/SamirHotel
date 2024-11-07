@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-5">Galería</h2>
    <div class="row">
    @foreach($galeria as $item)
    <div class="col-md-4 mb-4">
        <div class="card">
            <img src="{{ $item->imagen_url }}" class="card-img-top" alt="{{ $item->categoria }}">
            <div class="card-body">
                <h5 class="card-title">{{ $item->categoria }}</h5>
                <p class="card-text">{{ $item->descripcion }}</p>
            </div>
        </div>
    </div>
@endforeach
</div>
</div>
@endsection
