@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Detalle del Centro de Formación</h1>

        <ul class="list-group mb-3">
            <li class="list-group-item"><strong>ID:</strong> {{ $trainingCenter['id'] }}</li>
            <li class="list-group-item"><strong>Nombre:</strong> {{ $trainingCenter['name'] }}</li>
            <li class="list-group-item"><strong>Ubicación:</strong> {{ $trainingCenter['location'] }}</li>
        </ul>

        <a href="{{ url('trainingcenters.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
