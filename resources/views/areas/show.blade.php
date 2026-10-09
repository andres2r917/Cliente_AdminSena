@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalle del Área</h1>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $area['name'] }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $area['id'] ?? $area['id_area'] }}</p>
        </div>
    </div>

    <a href="{{ route('areas.index') }}" class="btn btn-secondary">Volver al listado</a>
</div>
@endsection