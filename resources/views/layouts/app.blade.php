<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - MoniSwa</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root{
            --tosca: #20c4b7;
            --tosca-dark: #17a79f;
            --orange: #ff7a00;
            --muted: #6c757d;
            --card-shadow: 0 6px 24px rgba(16,24,40,0.06);
        }

        html, body {
            height: 100%;
            margin: 0;
            font-family: "Poppins", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            background: linear-gradient(180deg, #fbfdfc 0%, #f3fbfa 100%);
            color: #083a38;
        }

        /* Sidebar */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--tosca) 0%, var(--tosca-dark) 100%);
            color: white;
            box-shadow: 2px 0 8px rgba(0,0,0,0.06);
        }

        .sidebar .p-4 {
            padding-top: 1.85rem;
            padding-bottom: 1.85rem;
        }

        .sidebar h4 {
            font-weight: 700;
            letter-spacing: 0.2px;
        }

        .sidebar hr {
            border-top: 1px solid rgba(255,255,255,0.12);
        }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.94);
            padding: 10px 14px;
            border-radius: 8px;
            margin: 5px 0;
            transition: background .18s ease, transform .18s ease;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-weight: 600;
        }

        .sidebar .nav-link i {
            width: 20px;
            font-size: 1.05rem;
            opacity: 0.95;
        }

        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.08);
            transform: translateX(6px);
            color: #fff;
        }

        .sidebar .nav-link.active {
            background: linear-gradient(90deg, rgba(255,255,255,0.12), rgba(255,255,255,0.08));
            color: #fff;
            box-shadow: 0 6px 18px rgba(16,24,40,0.06);
        }

        /* Main content wrapper */
        .content-wrapper {
            padding: 28px;
            min-height: calc(100vh - 64px);
        }

        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            margin-bottom: 22px;
        }

        .card-header {
            background-color: transparent;
            border-bottom: none;
            padding: 18px 20px;
            font-weight: 700;
            font-size: 1.05rem;
            color: #083a38;
        }

        .stats-card {
            border-left: 4px solid var(--tosca);
        }

        /* Table adjustments */
        .table {
            margin-bottom: 0;
            color: #163a38;
        }

        /* Buttons and badges */
        .btn {
            border-radius: 8px;
            padding: 8px 14px;
        }

        .btn-primary {
            background: linear-gradient(90deg, var(--tosca), var(--orange));
            border: none;
            box-shadow: 0 10px 30px rgba(32,196,183,0.06);
        }

        .badge {
            padding: 6px 10px;
            font-weight: 600;
            border-radius: 8px;
        }

        /* Top navbar */
        .navbar-brand {
            font-weight: 700;
            font-size: 1.15rem;
            color: #083a38;
        }

        .navbar {
            box-shadow: 0 1px 6px rgba(16,24,40,0.04);
        }

        .navbar .navbar-text {
            font-weight: 600;
            color: #0b2b2a;
        }

        /* Alerts */
        .alert {
            border-radius: 10px;
        }

        /* Responsive tweaks */
        @media (max-width: 991.98px) {
            .sidebar { min-height: auto; position: relative; }
            .content-wrapper { padding: 18px; }
        }

        @media (max-width: 576px) {
            .sidebar { display: none; }
            .content-wrapper { padding: 12px; }
        }
    </style>
    @stack('styles')
</head>
<body>
    @auth
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 px-0 sidebar">
                <div class="p-4">
                    <h4 class="text-white mb-4">
                        <i class="bi bi-mortarboard-fill"></i> MoniSwa
                    </h4>
                    <hr class="text-white">
                    <div class="mb-3">
                        <small class="text-white-50">Masuk sebagai:</small>
                        <div class="text-white fw-bold">{{ ucfirst(auth()->user()->role) }}</div>
                        @if(auth()->user()->role == 'siswa' && auth()->user()->siswa)
                            <small class="text-white-50">{{ auth()->user()->siswa->nama_siswa }}</small>
                        @elseif(auth()->user()->role == 'guru' && auth()->user()->guru)
                            <small class="text-white-50">{{ auth()->user()->guru->nama_guru }}</small>
                        @elseif(auth()->user()->role == 'wali' && auth()->user()->waliMurid)
                            <small class="text-white-50">{{ auth()->user()->waliMurid->nama_wali }}</small>
                        @endif
                    </div>
                </div>
            @include('layouts.navbar')
        </div>

        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 px-0">
            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                <div class="container-fluid">
                    <span class="navbar-text">
                        @yield('page-title', 'Dashboard')
                    </span>
                    <div class="ms-auto">
                        <span class="me-3">{{ now()->translatedFormat('l, d F Y') }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </nav>

            <!-- Content -->
            <div class="content-wrapper">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>
</div>
@else
    @yield('content')
@endauth

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>