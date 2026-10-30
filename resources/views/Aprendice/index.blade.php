@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <h1 class="text-center mb-4 text-success fw-bold">LISTA DE APRENDICES</h1>

        <!-- Botón para crear nuevo aprendiz (Fuera de la tabla) -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ route('apprentice.create') }}" class="btn btn-success rounded-pill px-3 shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Nuevo Aprendiz
            </a>
        </div>

        <div class="table-responsive bg-white p-3 rounded shadow-sm">
            <table id="idApprentice" class="table table-striped table-hover table-bordered align-middle mb-0" style="width:100%">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Curso</th>
                        <th>Computador</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apprentices as $apprentice)
                        <tr>
                            <td>{{ $apprentice->id }}</td> 
                            <td>{{ $apprentice->name }}</td> 
                            <td>{{ $apprentice->email }}</td> 
                            <td>{{ $apprentice->cell_number }}</td> 
                            <td>{{ $apprentice->course_id }}</td>
                            <td>{{ $apprentice->computer_id }}</td>
            
                            <td class="text-center">
                                <!-- Mostrar -->
                                <a href="{{ route('apprentice.show', $apprentice->id) }}" class="btn btn-info btn-sm text-white me-1">
                                    <i class="bi bi-eye"></i> Mostrar
                                </a>

                                <!-- Editar -->
                                <a href="{{ route('apprentice.edit', $apprentice->id) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <!-- Eliminar -->
                                <form action="{{ route('apprentice.destroy', $apprentice->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Deseas eliminar este aprendiz?')">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection