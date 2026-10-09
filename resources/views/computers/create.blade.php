@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Computador</h1>

    <form action="{{ route('computers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre o Serie del Computador</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('computers.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection