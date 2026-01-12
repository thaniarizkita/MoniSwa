<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login - SMAS Azzainiyyah</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css"/>

    <style>
        :root {
            --tosca: #20c4b7;
            --tosca-600: #17a79f;
            --tosca-100: #e8f7f5;
            --orange: #ff7a00;
            --orange-600: #ff5a00;
            --muted: #6c757d;
            --bg-gradient: linear-gradient(135deg, rgba(32,196,183,0.16), rgba(255,122,0,0.06));
            --card-shadow: 0 20px 50px rgba(16,24,40,0.12);
        }

        * { box-sizing: border-box; font-family: 'Poppins', sans-serif; }

        html, body { height: 100%; }

        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(1200px 600px at 10% 20%, rgba(32,196,183,0.08), transparent 8%),
                        radial-gradient(1000px 500px at 90% 80%, rgba(255,122,0,0.05), transparent 8%),
                        linear-gradient(180deg, #ffffff 0%, var(--tosca-100) 100%);
            padding: 24px;
            color: #083a38;
        }

        .login-container {
            width: 100%;
            max-width: 620px;
        }

        .login-card {
            background: linear-gradient(180deg, #ffffff, #ffffff);
            border-radius: 18px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            border: 1px solid rgba(16,24,40,0.04);
        }

        .login-header {
            display: flex;
            gap: 18px;
            align-items: center;
            padding: 28px;
            background: linear-gradient(90deg, var(--tosca), var(--orange));
            color: #fff;
        }

        .logo-wrap {
            width:72px;
            height:72px;
            background: rgba(255,255,255,0.12);
            border-radius: 14px;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:6px;
            box-shadow: 0 8px 24px rgba(16,24,40,0.08);
            flex-shrink:0;
            border: 2px solid rgba(255,255,255,0.08);
            color: #fff;
            font-size: 1.6rem;
        }

        .login-header .title {
            font-weight:700;
            font-size:1.25rem;
            line-height:1;
        }

        .login-header .subtitle {
            font-size:0.9rem;
            opacity:0.92;
        }

        .login-body {
            padding: 28px;
        }

        .role-title {
            text-align: center;
            margin-bottom: 18px;
            color: #083a38;
            font-weight: 700;
        }

        .role-buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 22px;
        }

        .role-btn {
            background: linear-gradient(180deg,#fff,#fff);
            border-radius: 12px;
            padding: 12px;
            text-align:center;
            border: 2px solid rgba(16,24,40,0.04);
            cursor: pointer;
            transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
            display:flex;
            flex-direction:column;
            gap:6px;
            align-items:center;
            justify-content:center;
            min-height:86px;
        }

        .role-btn i {
            font-size:1.45rem;
            padding:10px;
            border-radius:10px;
            background: linear-gradient(135deg, rgba(32,196,183,0.12), rgba(255,122,0,0.08));
            color: inherit;
            display:inline-flex;
            align-items:center;
            justify-content:center;
        }

        .role-name { font-weight:600; font-size:0.92rem; color:#083a38; }

        .role-btn:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(16,24,40,0.08);
            border-color: rgba(32,196,183,0.14);
        }

        .role-btn.active {
            background: linear-gradient(135deg, rgba(32,196,183,0.10), rgba(255,122,0,0.04));
            border-color: rgba(32,196,183,0.18);
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 20px 50px rgba(32,196,183,0.06);
        }

        .form-control {
            padding: 12px 14px;
            border-radius: 10px;
            border: 1.5px solid rgba(16,24,40,0.06);
            transition: box-shadow .15s ease, border-color .15s ease;
        }

        .form-control:focus {
            border-color: var(--tosca-600);
            box-shadow: 0 6px 20px rgba(23,167,159,0.08);
            outline: none;
        }

        .input-group-text {
            border-radius: 10px 0 0 10px;
            border: 1.5px solid rgba(16,24,40,0.06);
            border-right: none;
            background: #f8f9fa;
            color: #6c757d;
        }

        .input-group .form-control {
            border-radius: 0 10px 10px 0;
            border-left: none;
        }

        .btn-login {
            width: 100%;
            padding: 12px 14px;
            border-radius: 12px;
            background: linear-gradient(90deg, var(--tosca), var(--orange));
            border: none;
            color: #fff;
            font-weight:700;
            box-shadow: 0 14px 40px rgba(32,196,183,0.08);
            transition: transform .14s ease, box-shadow .14s ease;
        }

        .btn-login:hover { transform: translateY(-3px); box-shadow: 0 18px 50px rgba(32,196,183,0.12); }

        .btn-back {
            width: 100%;
            padding: 10px 14px;
            border-radius: 12px;
            border: 1.5px solid rgba(16,24,40,0.06);
            background: #fff;
            color: #083a38;
            font-weight:600;
        }

        .login-info {
            background: linear-gradient(180deg, #fbfbfb, #ffffff);
            border-radius: 10px;
            padding: 12px;
            margin-top: 16px;
            font-size: 0.9rem;
            color: var(--muted);
            text-align:center;
            border:1px solid rgba(16,24,40,0.03);
        }

        .role-note { font-size:0.85rem; color:var(--muted); text-align:center; margin-top:10px; }

        @media (max-width: 992px) {
            .role-buttons { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 576px) {
            .role-buttons { grid-template-columns: 1fr; }
            .login-header { padding: 18px; gap:12px; }
            .logo-wrap { width:58px; height:58px; }
            .login-body { padding: 18px; }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">

            <!-- Header with icon instead of logo image -->
            <div class="login-header">
                <div class="logo-wrap" aria-hidden="true">
                    <!-- Icon used as a logo replacement -->
                    <i class="bi bi-mortarboard-fill" style="font-size:1.6rem;"></i>
                </div>

                <div>
                    <div class="title">SMAS Azzainiyyah</div>
                    <div class="subtitle">Sistem Monitoring Prestasi & Pelanggaran</div>
                </div>
            </div>

            <!-- Body -->
            <div class="login-body">
                <h5 class="role-title">Pilih Role Anda</h5>

                @if($errors->any())
                <div class="alert alert-danger rounded-3">
                    <i class="bi bi-exclamation-circle me-2"></i>
                    @foreach($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
                @endif

                <form action="{{ route('login') }}" method="POST" id="loginForm">
                    @csrf

                    <input type="hidden" name="role" id="selectedRole" required>

                    <div class="role-buttons" id="roleButtons">
                        <div class="role-btn" onclick="selectRole('admin', this)" role="button" aria-pressed="false" tabindex="0">
                            <i class="bi bi-shield-fill-check" style="color: var(--orange);"></i>
                            <div class="role-name">Admin</div>
                        </div>

                        <div class="role-btn" onclick="selectRole('guru', this)" role="button" aria-pressed="false" tabindex="0">
                            <i class="bi bi-person-badge-fill" style="color: var(--tosca-600);"></i>
                            <div class="role-name">Guru / BK</div>
                        </div>

                        <div class="role-btn" onclick="selectRole('siswa', this)" role="button" aria-pressed="false" tabindex="0">
                            <i class="bi bi-person-fill" style="color: #2b7fa0;"></i>
                            <div class="role-name">Siswa</div>
                        </div>

                        <div class="role-btn" onclick="selectRole('wali', this)" role="button" aria-pressed="false" tabindex="0">
                            <i class="bi bi-people-fill" style="color: #f2994a;"></i>
                            <div class="role-name">Wali Murid</div>
                        </div>
                    </div>

                    <!-- Login fields: hidden until role selected -->
                    <div id="loginFormFields" style="display:none;">
                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold">Username</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror"
                                       placeholder="Masukkan username" value="{{ old('username') }}" autocomplete="username" />
                            </div>
                            @error('username')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Masukkan password" autocomplete="current-password" />
                            </div>
                            @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-login">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Login
                            </button>

                            <button type="button" class="btn btn-back" onclick="resetForm()">
                                <i class="bi bi-arrow-left me-2"></i>Kembali Pilih Role
                            </button>
                        </div>
                    </div>
                </form>

                <div class="login-info">
                    <i class="bi bi-info-circle me-1"></i>
                    Login menggunakan akun yang sudah terdaftar
                </div>

                <div class="role-note">
                    <a href="{{ route('landing') }}" class="text-decoration-none" style="color:var(--muted)">
                        <i class="bi bi-house-door me-1"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // selectRole now receives (role, element) to avoid relying on global event
        function selectRole(role, el) {
            // set chosen value to hidden input
            document.getElementById('selectedRole').value = role;

            // remove active from all, set aria-pressed
            document.querySelectorAll('.role-btn').forEach(btn => {
                btn.classList.remove('active');
                btn.setAttribute('aria-pressed', 'false');
            });

            // mark clicked
            el.classList.add('active');
            el.setAttribute('aria-pressed', 'true');

            // show login fields
            document.getElementById('loginFormFields').style.display = 'block';

            // focus username after a short delay
            setTimeout(() => {
                const username = document.getElementById('username');
                if (username) username.focus();
            }, 160);

            // smooth scroll to inputs on small screens
            if (window.innerWidth < 768) {
                setTimeout(() => {
                    document.getElementById('loginFormFields').scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 220);
            }
        }

        function resetForm() {
            // hide form fields
            document.getElementById('loginFormFields').style.display = 'none';

            // clear selection
            document.querySelectorAll('.role-btn').forEach(btn => {
                btn.classList.remove('active');
                btn.setAttribute('aria-pressed', 'false');
            });

            // reset inputs
            const form = document.getElementById('loginForm');
            if (form) form.reset();
            document.getElementById('selectedRole').value = '';

            // scroll to top of card
            document.querySelector('.role-title').scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        // If server returned old('role') (on validation error), simulate selection
        @if(old('role'))
        window.addEventListener('DOMContentLoaded', function() {
            const wanted = "{{ old('role') }}";
            document.querySelectorAll('.role-btn').forEach(btn => {
                // each button's onclick contains the role, so read dataset via role-name text if needed
                const name = btn.querySelector('.role-name')?.textContent?.toLowerCase();
                if ( (name && name.includes(wanted)) || btn.onclick?.toString().includes("'" + wanted + "'") ) {
                    // call selectRole with element reference
                    selectRole(wanted, btn);
                }
            });
        });
        @endif
    </script>
</body>
</html>