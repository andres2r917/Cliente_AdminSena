@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Computador</h1>

    <form action="{{ route('computers.update', $computer['id'] ?? $computer['id_computer']) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nombre o Serie del Computador</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $computer['name'] ?? $computer['serial_number'] }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('computers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection