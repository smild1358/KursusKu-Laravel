<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'KursusKu — Platform Pembelajaran Digital')</title>

    <!-- Google Fonts & Font Awesome Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @include('partials.navbar')

    <main class="container py-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
                <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- FITUR 4: Floating DevTools Ajax Inspector Toast -->
    <div id="ajax-debug-toast" class="card bg-dark text-white border-secondary">
        <div class="card-header bg-black d-flex justify-content-between align-items-center py-2">
            <span class="fw-bold text-teal"><i class="fa-solid fa-network-wired me-1"></i> DevTools Network Inspector</span>
            <button type="button" class="btn-close btn-close-white btn-sm" onclick="$('#ajax-debug-toast').fadeOut()"></button>
        </div>
        <div class="card-body p-3">
            <div class="mb-1"><span class="text-secondary">URL:</span> <code id="debug-url" class="text-info"></code></div>
            <div class="mb-2"><span class="text-secondary">Status:</span> <span id="debug-status"></span></div>
            <div class="text-secondary mb-1">JSON Response Payload:</div>
            <pre id="debug-json" class="bg-black text-warning p-2 rounded mb-0" style="max-height: 120px; overflow-y: auto;"></pre>
        </div>
    </div>

    <footer class="text-center py-4 text-secondary">
        <small>© 2026 <strong>KursusKu Laravel</strong> — Elite Learning Prototype.</small>
    </footer>

</body>
</html>