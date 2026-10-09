@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Áreas</h1>
            <a href="{{ route('areas.create') }}" class="btn btn-primary">Nueva Área</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($areas as $area)
                <tr>
                    <td>{{ $area['id'] ?? $area['id_area'] }}</td>
                    <td>{{ $area['name'] }}</td>
                    <td>
                        <a href="{{ route('areas.show', $area['id'] ?? $area['id_area']) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('areas.edit', $area['id'] ?? $area['id_area']) }}" class="btn btn-warning btn-sm">Editar</a>
                        
                        <form action="{{ route('areas.destroy', $area['id'] ?? $area['id_area']) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar esta área?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection