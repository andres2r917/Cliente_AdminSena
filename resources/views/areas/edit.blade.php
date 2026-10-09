@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Área</h1>

    <form action="{{ route('areas.update', $area['id'] ?? $area['id_area']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Área</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $area['name'] }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('areas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection