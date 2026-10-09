@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Centro de Formación</h1>

    <form action="{{ route('trainingcenters.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del Centro</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('trainingcenters.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection