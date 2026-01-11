<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - SMAS Azzainiyyah</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Custom CSS -->
    <style>
        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, #0d6efd 0%, #0a58ca 100%);
            color: white;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            border-radius: 8px;
            margin: 4px 0;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.2);
            color: white;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
        }
        .content-wrapper {
            padding: 30px;
        }
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 24px;
        }
        .card-header {
            background-color: white;
            border-bottom: 2px solid #e9ecef;
            padding: 20px;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .stats-card {
            border-left: 4px solid #0d6efd;
        }
        .table {
            margin-bottom: 0;
        }
        .btn {
            border-radius: 8px;
            padding: 8px 16px;
        }
        .badge {
            padding: 6px 12px;
            font-weight: 500;
        }
        .navbar-brand {
            font
            -weight: 700;
        font-size: 1.3rem;
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
                        <i class="bi bi-mortarboard-fill"></i> SMAS Azzainiyyah
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