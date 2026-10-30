@extends('layouts.app')

@section('content')
@php
    $currentArea = $area ?? $areas ?? null;
    $areaId = $currentArea ? ($currentArea->id ?? $currentArea['id'] ?? $currentArea['id_area'] ?? '') : '';
    $areaName = $currentArea ? ($currentArea->name ?? $currentArea['name'] ?? '') : '';
    $createdAt = $currentArea ? ($currentArea->created_at ?? $currentArea['created_at'] ?? null) : null;
    $updatedAt = $currentArea ? ($currentArea->updated_at ?? $currentArea['updated_at'] ?? null) : null;
@endphp
<div class="container mt-5 mb-5">

    <div class="card shadow-lg border-0">

        <div class="card-header bg-success text-white">
            <h3 class="mb-0">
                {{ $areaName ?: 'Detalle del Área' }}
            </h3>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">ID</label>
                    <div class="form-control bg-light">
                        {{ $areaId }}
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Nombre</label>
                    <div class="form-control">
                        {{ $areaName }}
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
                <a href="{{ route('areas.index') }}" class="btn btn-secondary">Volver</a>
            </div>

        </div>

    </div>

</div>
@endsection
