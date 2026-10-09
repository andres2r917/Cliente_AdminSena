@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Detalle del Computador</h1>

        <ul class="list-group mb-3">
            <li class="list-group-item"><strong>ID:</strong> {{ $computer['id'] }}</li>
            <li class="list-group-item"><strong>Número:</strong> {{ $computer['number'] }}</li>
            <li class="list-group-item"><strong>Marca:</strong> {{ $computer['brand'] }}</li>
        </ul>

        <a href="{{ url('computers.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
