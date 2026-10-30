@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow border-0 rounded-4">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0">Registrar Centro de Formación</h4>
                </div>

                <div class="card-body">
                    <!-- Importante: enctype para permitir el envío de archivos -->
                    <form action="{{ route('trainingcenters.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Nombre
                            </label>
                            <input
                                type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name') }}"
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
                                value="{{ old('location') }}"
                                placeholder="Ingrese la ubicación del centro"
                                required>
                        </div>

                        <!-- Nuevo campo para la imagen -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">
                                Imagen
                            </label>
                            <input
                                type="file"
                                name="imagen"
                                class="form-control"
                                accept="image/jpeg,image/png,image/jpg,image/webp"
                                required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('trainingcenters.index') }}" class="btn btn-secondary">
                                Cancelar
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar Centro
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection