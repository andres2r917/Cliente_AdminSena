<nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #2cb039; border-bottom: 3px solid #39a900;">
  <div class="container-fluid">

    {{-- CAMBIO: route('home') no existe en el cliente, se llama home.index --}}
    <a class="navbar-brand d-flex align-items-center me-3" href="{{ route('home.index') }}">
      <span class="bg-white rounded p-1 d-inline-block">
        <img src="https://pautonoticias.com/sites/default/files/Article/sena-colombia-logo-green39a900png-20250120.png"
             alt="Logo SENA" width="40" height="40" class="img-fluid">
      </span>
      <span class="ms-2 fw-bold text-white fs-5">AdminSENA</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold">

        <!-- Inicio -->
        <li class="nav-item">
          <a class="nav-link text-white d-flex align-items-center gap-1" href="{{ route('home.index') }}">
            <i class="bi bi-house-door-fill"></i> Inicio
          </a>
        </li>

        <!-- Desplegable Registrar: solo los 3 módulos que existen en el cliente -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white d-flex align-items-center gap-1" href="#" id="registrarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-pencil-square"></i> Registrar
          </a>
          <ul class="dropdown-menu border-0 shadow" aria-labelledby="registrarDropdown">
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('areas.create') }}"><i class="bi bi-diagram-3"></i> Área</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('trainingcenters.create') }}"><i class="bi bi-building"></i> Centro de Formación</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('computers.create') }}"><i class="bi bi-pc-display"></i> Computador</a></li>
          </ul>
        </li>

        <!-- Desplegable Listas -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white d-flex align-items-center gap-1" href="#" id="listasDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-list-ul"></i> Ver Listas
          </a>
          <ul class="dropdown-menu border-0 shadow" aria-labelledby="listasDropdown">
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('areas.index') }}"><i class="bi bi-diagram-3"></i> Áreas</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('trainingcenters.index') }}"><i class="bi bi-building"></i> Centros</a></li>
            <li><a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('computers.index') }}"><i class="bi bi-pc-display"></i> Computadores</a></li>
          </ul>
        </li>
      </ul>

      {{-- Se quitaron "Nosotros", el buscador y "Iniciar Sesión": sus rutas (about.nosotros, search, login)
           no existen en el cliente. Vuelve a ponerlos cuando agregues esas rutas. --}}

    </div>
  </div>
</nav>