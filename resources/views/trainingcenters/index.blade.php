@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Centros de Formación</h1>
            <a href="{{ route('trainingcenters.create') }}" class="btn btn-primary">Nuevo Centro</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trainingcenters as $item)
                    <tr>
                        <td>{{ $item['id'] ?? $item['id_training_center'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['location'] }}</td>
                        <td>
                            <a href="{{ route('trainingcenters.show', $item['id'] ?? $item['id_training_center']) }}" class="btn btn-info btn-sm text-white">Ver más</a>
                            <a href="{{ route('trainingcenters.edit', $item['id'] ?? $item['id_training_center']) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('trainingcenters.destroy', $item['id'] ?? $item['id_training_center']) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar este centro de formación?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection