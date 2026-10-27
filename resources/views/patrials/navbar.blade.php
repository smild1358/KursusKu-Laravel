<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top py-3">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4 d-flex align-items-center" href="{{ route('home') }}">
            <i class="fa-solid fa-graduation-cap me-2 text-warning"></i> KursusKu
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto align-items-center gap-2">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">
                        <i class="fa-solid fa-house me-1"></i> Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-warning text-dark fw-bold px-4 rounded-pill shadow-sm" href="{{ route('enrollments.create') }}">
                        <i class="fa-solid fa-pen-to-square me-1"></i> Pendaftaran
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>