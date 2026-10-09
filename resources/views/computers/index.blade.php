@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Lista de Computadores</h1>
            <a href="{{ route('computers.create') }}" class="btn btn-primary">Nuevo Computador</a>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Número</th>
                    <th>Marca</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($computers as $item)
                    <tr>
                        <td>{{ $item['id'] ?? $item['id_computer'] }}</td>
                        <td>{{ $item['number'] }}</td>
                        <td>{{ $item['brand'] }}</td>
                        <td>
                            <a href="{{ route('computers.show', $item['id'] ?? $item['id_computer']) }}" class="btn btn-info btn-sm text-white">Ver más</a>
                            <a href="{{ route('computers.edit', $item['id'] ?? $item['id_computer']) }}" class="btn btn-warning btn-sm">Editar</a>
                            
                            <form action="{{ route('computers.destroy', $item['id'] ?? $item['id_computer']) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Desea eliminar este computador?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
