@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registrar Computador</h4>
                </div>

                <div class="card-body">

                    {{-- Mostrar errores de validación devueltos por la API --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('computers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="number" class="form-label fw-bold">Número del Computador</label>
                            <input type="text" name="number" id="number" class="form-control"
                                   value="{{ old('number') }}" placeholder="Ej: PC-001" required>
                        </div>

                        <div class="mb-3">
                            <label for="brand" class="form-label fw-bold">Marca</label>
                            <input type="text" name="brand" id="brand" class="form-control"
                                   value="{{ old('brand') }}" placeholder="Ej: HP, Lenovo, Dell" required>
                        </div>

                        <div class="mb-3">
                            <label for="environment_id" class="form-label fw-bold">Ambiente (Opcional)</label>
                            <select name="environment_id" id="environment_id" class="form-select">
                                <option value="">Sin ambiente asignado</option>
                                @foreach ($environments as $env)
                                    @php
                                        $envId   = $env->id ?? $env['id'] ?? '';
                                        $envName = $env->name ?? $env['name'] ?? '';
                                    @endphp
                                    <option value="{{ $envId }}"
                                        {{ old('environment_id') == $envId ? 'selected' : '' }}>
                                        {{ $envName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="imagen" class="form-label fw-bold">Imagen del Computador</label>
                            <input type="file" name="imagen" id="imagen" class="form-control"
                                   accept="image/*" required>
                            <div class="form-text">Formatos: JPG, PNG, WEBP. Máx: 5MB.</div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('computers.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Guardar Computador</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
