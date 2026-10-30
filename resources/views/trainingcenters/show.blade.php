@extends('layouts.app')

@section('content')
@php
    $center = $trainingcenter ?? $Training_centers ?? $trainingCenter ?? null;
    $centerId = $center ? ($center->id ?? $center['id'] ?? $center['id_training_center'] ?? '') : '';
    $centerName = $center ? ($center->name ?? $center['name'] ?? '') : '';
    $centerLocation = $center ? ($center->location ?? $center['location'] ?? '') : '';
    $createdAt = $center ? ($center->created_at ?? $center['created_at'] ?? null) : null;
    $updatedAt = $center ? ($center->updated_at ?? $center['updated_at'] ?? null) : null;
@endphp
<div class="container mt-5 mb-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-success text-white">
            <h3 class="mb-0">
                {{ $centerName ?: 'Detalle del Centro de Formación' }}
            </h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">ID</label>
                    <div class="form-control bg-light">
                        {{ $centerId }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Nombre</label>
                    <div class="form-control">
                        {{ $centerName }}
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Ubicación</label>
                    <div class="form-control">
                        {{ $centerLocation }}
                    </div>
                </div>

            </div>

            <hr class="my-4">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Fecha de creación</label>
                    <div class="form-control text-muted">
                        {{ !empty($createdAt) ? \Carbon\Carbon::parse($createdAt)->format('d/m/Y H:i') : 'No registrada' }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Última actualización</label>
                    <div class="form-control text-muted">
                        {{ !empty($updatedAt) ? \Carbon\Carbon::parse($updatedAt)->format('d/m/Y H:i') : 'No registrada' }}
                    </div>
                </div>

            </div>

            <div class="mt-4 text-end">
                <a href="{{ route('trainingcenters.index') }}" class="btn btn-secondary">Volver</a>
            </div>

        </div>

    </div>

</div>
@endsection
