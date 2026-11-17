<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand fw-extrabold d-flex align-items-center gap-2" href="{{ route('home') }}">
            <i class="fa-solid fa-graduation-cap text-warning fs-3"></i>
            <span class="fs-4 tracking-tight">Kursus<span class="text-warning">Ku</span> <small class="fs-6 text-emerald fw-bold">Laravel</small></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active text-warning fw-bold' : '' }}" href="{{ route('home') }}">
                        <i class="fa-solid fa-house me-1"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-teal ms-lg-2" href="{{ route('enrollments.create') }}">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Pendaftaran Kursus
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>