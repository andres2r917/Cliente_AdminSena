@extends('layouts.app')

@section('content')
@php
    $center = $trainingcenter ?? $Training_centers ?? null;
    $centerId = $center ? ($center->id ?? $center['id'] ?? $center['id_training_center'] ?? $center) : '';
    $centerName = $center ? ($center->name ?? $center['name'] ?? '') : '';
    $centerLocation = $center ? ($center->location ?? $center['location'] ?? '') : '';
@endphp
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Actualizar Centro de Formación</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('trainingcenters.update', $centerId) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Nombre
                            </label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', $centerName) }}"
                                placeholder="Ingrese el nombre del centro"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Ubicación
                            </label>
                            <input
                                type="text"
                                name="location"
                                class="form-control"
                                value="{{ old('location', $centerLocation) }}"
                                placeholder="Ingrese la ubicación"
                                required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('trainingcenters.index') }}" class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Actualizar Centro
                            </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
