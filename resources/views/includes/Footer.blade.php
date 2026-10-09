<!-- Footer Institucional AdminSENA -->
<footer class="bg-dark text-white pt-5 pb-4" style="border-top: 3px solid #39a900;">
    <div class="container-fluid px-4 px-md-5">
        <div class="row g-4">

            <!-- Columna 1: Información Institucional -->
            <div class="col-lg-4 col-md-6">
                <h5 class="fw-bold mb-3" style="color:#39a900;">
                    <i class="fas fa-graduation-cap me-2"></i>AdminSENA
                </h5>
                <p class="text-secondary small">
                    Sistema para consultar las áreas, los centros de formación y los equipos tecnológicos del Centro de Formación SENA.
                </p>
                <div class="mt-3">
                    <a href="https://facebook.com" target="_blank" class="btn btn-outline-light btn-sm rounded-circle me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com" target="_blank" class="btn btn-outline-light btn-sm rounded-circle me-2"><i class="fab fa-twitter"></i></a>
                    <a href="https://instagram.com" target="_blank" class="btn btn-outline-light btn-sm rounded-circle me-2"><i class="fab fa-instagram"></i></a>
                    <a href="https://youtube.com" target="_blank" class="btn btn-outline-light btn-sm rounded-circle"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Columna 2: solo los módulos que existen en el cliente -->
            <div class="col-lg-4 col-md-6">
                <h5 class="fw-bold mb-3 text-light">Módulos del Sistema</h5>
                <ul class="list-unstyled small">
                    <li class="mb-2">
                        {{-- CAMBIO: route('home') no existe en el cliente, se llama home.index --}}
                        <a href="{{ route('home.index') }}" class="text-secondary text-decoration-none hover-white">
                            <i class="fas fa-chevron-right me-1 small" style="color:#39a900;"></i> Inicio
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('areas.index') }}" class="text-secondary text-decoration-none">
                            <i class="fas fa-chevron-right me-1 small" style="color:#39a900;"></i> Áreas
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('trainingcenters.index') }}" class="text-secondary text-decoration-none">
                            <i class="fas fa-chevron-right me-1 small" style="color:#39a900;"></i> Centros de Formación
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('computers.index') }}" class="text-secondary text-decoration-none">
                            <i class="fas fa-chevron-right me-1 small" style="color:#39a900;"></i> Equipos y Ambientes
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Columna 3: Contacto Institucional -->
            <div class="col-lg-4 col-md-12">
                <h5 class="fw-bold mb-3 text-light">Contacto e Información</h5>
                <ul class="list-unstyled text-secondary small">
                    <li class="mb-2">
                        <i class="fas fa-map-marker-alt me-2" style="color:#39a900;"></i> Centro de Formación SENA
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-phone-alt me-2" style="color:#39a900;"></i> Línea Gratuita: 01 8000 910270
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-envelope me-2" style="color:#39a900;"></i> contacto@sena.edu.co
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-clock me-2" style="color:#39a900;"></i> Lunes a Viernes: 7:00 AM - 5:00 PM
                    </li>
                </ul>
            </div>

        </div>

        <hr class="border-secondary my-4">

        <div class="row align-items-center small text-secondary">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0">&copy; {{ date('Y') }} <strong style="color:#39a900;">AdminSENA</strong>. Todos los derechos reservados.</p>
            </div>
            <div class="col-md-6 text-center text-md-end mt-2 mt-md-0">
                <span>Servicio Nacional de Aprendizaje - SENA</span>
            </div>
        </div>
    </div>
</footer>