<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>SMAS Azzainiyyah — Sistem Monitoring Prestasi & Pelanggaran</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

  <style>
    :root{
      --tosca: #20c4b7;
      --tosca-dark: #17a79f;
      --orange: #ff7a00;
      --muted: #6c757d;
      --bg: #f7fffe;
      --card-shadow: 0 14px 40px rgba(8,58,56,0.06);
    }

    *{ box-sizing: border-box; font-family: "Poppins", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }

    html,body{ height: 100%; margin: 0; background: linear-gradient(180deg,var(--bg) 0%, #ffffff 60%); color: #063733; -webkit-font-smoothing:antialiased; }

    /* Keep content visible below fixed navbar */
    body { padding-top: 76px; }

    /* NAVBAR */
    .site-nav{
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1050;
      background: linear-gradient(90deg,var(--tosca),var(--orange));
      box-shadow: 0 8px 28px rgba(16,24,40,0.08);
      border-bottom: 1px solid rgba(255,255,255,0.06);
    }
    .site-nav .container { display:flex; align-items:center; gap:1rem; }
    .brand {
      display:flex;
      align-items:center;
      gap:.75rem;
      color: #fff;
      text-decoration:none;
      font-weight:800;
      font-size:1.1rem;
    }
    .brand-icon{
      width:54px; height:54px; border-radius:12px; display:inline-flex; align-items:center; justify-content:center;
      background: rgba(255,255,255,0.12); color:#fff; font-size:1.4rem; box-shadow: 0 10px 30px rgba(16,24,40,0.08);
    }
    .site-nav .nav-link{ color: rgba(255,255,255,0.95); font-weight:600; }
    .site-nav .btn-cta {
      background: #fff; color: var(--tosca-dark); border-radius:999px; padding:10px 18px; font-weight:700;
      box-shadow: 0 10px 30px rgba(32,196,183,0.08);
    }
    .site-nav .btn-cta:hover { transform: translateY(-3px); }

    /* HERO */
    .hero {
      padding: 56px 0 36px;
    }
    .hero-grid {
      display: grid;
      grid-template-columns: 1fr 540px;
      gap: 32px;
      align-items: center;
    }

    .hero-card{
      background: linear-gradient(180deg, #fff 0%, #ffffff 100%);
      border-radius: 18px;
      padding: 40px;
      box-shadow: var(--card-shadow);
      border: 1px solid rgba(8,58,56,0.03);
    }

    .hero-title{
      font-size: 3.3rem;
      line-height: 1.02;
      font-weight:900;
      color:#042f2d;
      margin-bottom: .4rem;
    }
    .hero-lead{
      font-size:1.125rem;
      color:#1f504d;
      margin-bottom:1.1rem;
    }
    .hero-desc{ color:var(--muted); font-size:1rem; margin-bottom:1.6rem; }

    .hero-actions{ display:flex; gap:12px; flex-wrap:wrap; align-items:center; }

    .hero-visual{
      display:flex;
      align-items:center;
      justify-content:center;
    }

    .visual-circle{
      width: 420px;
      height: 420px;
      max-width: 92%;
      border-radius: 28px;
      display:flex;
      align-items:center;
      justify-content:center;
      background: linear-gradient(135deg, rgba(32,196,183,0.10), rgba(255,122,0,0.06));
      box-shadow: 0 20px 60px rgba(8,58,56,0.06);
      border: 1px solid rgba(8,58,56,0.03);
    }

    .visual-circle i{
      font-size: 9rem;
      color: rgba(3,22,21,0.08);
    }

    /* FEATURES */
    .features { padding: 44px 0; }
    .features .grid { display:grid; grid-template-columns: repeat(3,1fr); gap:22px; }
    .feature {
      background:#fff; border-radius:14px; padding:22px; box-shadow: var(--card-shadow); border:1px solid rgba(8,58,56,0.03);
      display:flex; gap:16px; align-items:flex-start;
    }
    .feature .icon {
      width:64px; height:64px; border-radius:12px; display:flex; align-items:center; justify-content:center; color:#fff;
      background: linear-gradient(135deg,var(--tosca),var(--orange)); font-size:1.6rem;
      box-shadow: 0 10px 28px rgba(32,196,183,0.06);
      flex-shrink:0;
    }
    .feature h5 { margin:0 0 6px 0; font-weight:800; color:#063733; }
    .feature p { margin:0; color:var(--muted); }

    /* STATS */
    .stats { padding: 44px 0; }
    .stats-grid { display:grid; grid-template-columns: repeat(3,1fr); gap:18px; align-items:stretch; }
    .stat {
      background:#fff; border-radius:12px; padding:20px; text-align:center; box-shadow: var(--card-shadow); border:1px solid rgba(8,58,56,0.03);
    }
    .stat .num { font-size:2rem; font-weight:900; color:#063733; }
    .stat .label { color:var(--muted); margin-top:8px; }

    /* ABOUT */
    .about { padding: 36px 0; }
    .about .card { padding:22px; border-radius:14px; box-shadow:var(--card-shadow); border:1px solid rgba(8,58,56,0.03); }

    /* FOOTER */
    footer { padding: 36px 0; background: linear-gradient(90deg,#063733,#0f2f2d); color:#fff; }
    footer a { color: rgba(255,255,255,0.9); text-decoration:none; }

    /* Responsive */
    @media (max-width: 1100px) {
      .hero-grid { grid-template-columns: 1fr; }
      .visual-circle { width: 340px; height:340px; }
      .features .grid { grid-template-columns: repeat(2,1fr); }
      .stats-grid { grid-template-columns: repeat(2,1fr); }
    }
    @media (max-width: 576px) {
      body { padding-top: 68px; }
      .visual-circle { width: 240px; height:240px; }
      .brand { font-size:1rem; }
      .hero-title { font-size:2rem; }
      .features .grid { grid-template-columns: 1fr; }
      .stats-grid { grid-template-columns: 1fr; }
      .site-nav .btn-cta { padding:8px 12px; font-size:.95rem; }
    }
  </style>
</head>
<body>

  <!-- NAVBAR (icon used instead of image logo) -->
  <nav class="site-nav navbar navbar-expand-lg">
    <div class="container">
      <a class="brand" href="{{ route('landing') }}">
        <span class="brand-icon" aria-hidden="true"><i class="bi bi-mortarboard-fill"></i></span>
        <span>SMAS Azzainiyyah</span>
      </a>

      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" aria-controls="navMain" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="filter: invert(1)"></span>
      </button>

      <div class="collapse navbar-collapse" id="navMain">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item"><a class="nav-link" href="#beranda">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
          <li class="nav-item"><a class="nav-link" href="#fitur">Fitur</a></li>
          <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
          <li class="nav-item ms-3">
            <a class="btn btn-cta" href="{{ route('login') }}">
              <i class="bi bi-box-arrow-in-right me-2"></i> Masuk
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <main class="container hero" id="beranda">
    <div class="hero-grid">
      <div class="hero-card">
        <div class="mb-3">
          <span style="display:inline-block; background:rgba(32,196,183,0.08); padding:.35rem .9rem; border-radius:999px; color:var(--tosca-dark); font-weight:700;"> MoniSwa-Monitoring Siswa</span>
        </div>

        <h1 class="hero-title">Sistem Monitoring Prestasi & Pelanggaran Siswa</h1>
        <p class="hero-lead">Monitioring terpusat untuk Administrasi Sekolah — pantau prestasi, rekam pelanggaran, dan hasilkan laporan profesional dalam satu platform.</p>
        <p class="hero-desc">Akses mudah untuk Admin, Guru/BK, Siswa, dan Wali Murid. Laporan PDF otomatis, upload sertifikat digital, dan sistem poin pelanggaran terstruktur.</p>

        <div class="hero-actions">
          <a class="btn btn-cta" href="{{ route('login') }}"> <i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Sistem</a>
          <a class="btn btn-outline-light" href="#fitur" style="background:transparent; border:2px solid rgba(6,55,51,0.06); color:#063733; font-weight:700;">Lihat Fitur <i class="bi bi-arrow-down ms-2"></i></a>
        </div>

        <div class="mt-4 d-flex gap-3 flex-wrap" style="color:var(--muted); font-weight:600;">
          <div>4 Role • Admin, Guru/BK, Siswa, Wali</div>
          <div>|</div>
          <div>Laporan PDF siap cetak</div>
        </div>
      </div>

      <div class="hero-visual">
        <div class="visual-circle" aria-hidden="true">
          <i class="bi bi-trophy-fill"></i>
        </div>
      </div>
    </div>
  </main>

  <!-- ABOUT -->
  <section class="about container" id="tentang">
    <div class="row g-4 align-items-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h3 class="mb-3" style="font-weight:800;">Tentang SMAS Azzainiyyah</h3>
            <p class="text-muted mb-3">Sekolah Menengah Atas Swasta (SMAS) Azzainiyyah berkomitmen mengembangkan potensi akademik dan karakter siswa. Sistem ini mempermudah kolaborasi antara guru, admin, dan orang tua untuk mendukung perkembangan siswa.</p>
            <p class="mb-0"><strong>Visi:</strong> Menjadi sekolah unggulan yang menghasilkan generasi berakhlak mulia dan berprestasi.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="row g-3">
          <div class="col-md-6">
            <div class="card p-3 h-100">
              <div class="d-flex gap-3 align-items-start">
                <div style="width:56px;height:56px;border-radius:12px;background:linear-gradient(135deg,var(--tosca),var(--orange));display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.25rem;">
                  <i class="bi bi-shield-check"></i>
                </div>
                <div>
                  <h6 style="margin:0;font-weight:800;">Keamanan Data</h6>
                  <div class="text-muted small">Perlindungan data berlapis untuk privasi siswa.</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="card p-3 h-100">
              <div class="d-flex gap-3 align-items-start">
                <div style="width:56px;height:56px;border-radius:12px;background:linear-gradient(135deg,var(--tosca),var(--orange));display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.25rem;">
                  <i class="bi bi-graph-up-arrow"></i>
                </div>
                <div>
                  <h6 style="margin:0;font-weight:800;">Monitoring Real-time</h6>
                  <div class="text-muted small">Pantau perkembangan dan statistik kelas secara langsung.</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div class="card p-3">
              <div class="d-flex gap-3 align-items-start">
                <div style="width:56px;height:56px;border-radius:12px;background:linear-gradient(135deg,var(--tosca),var(--orange));display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.25rem;">
                  <i class="bi bi-people"></i>
                </div>
                <div>
                  <h6 style="margin:0;font-weight:800;">Kolaborasi Orang Tua</h6>
                  <div class="text-muted small">Orang tua dapat memantau prestasi dan perkembangan anak setiap saat.</div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <!-- FEATURES -->
  <section class="features container" id="fitur" aria-labelledby="fitur-title">
    <div class="text-center mb-4">
      <h2 id="fitur-title" style="font-weight:900;">Fitur Unggulan</h2>
      <p class="text-muted">Fitur lengkap untuk pengelolaan prestasi dan pelanggaran siswa dengan antarmuka yang intuitif.</p>
    </div>

    <div class="grid">
      <div class="feature">
        <div class="icon"><i class="bi bi-shield-lock-fill"></i></div>
        <div>
          <h5>Multi-Role Access</h5>
          <p>Kontrol akses lengkap untuk Admin, Guru/BK, Siswa, dan Wali Murid.</p>
        </div>
      </div>

      <div class="feature">
        <div class="icon"><i class="bi bi-trophy-fill"></i></div>
        <div>
          <h5>Pencatatan Prestasi</h5>
          <p>Catat prestasi dengan bukti digital, cetak sertifikat, dan arsip otomatis.</p>
        </div>
      </div>

      <div class="feature">
        <div class="icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
        <div>
          <h5>Sistem Poin Pelanggaran</h5>
          <p>Penilaian pelanggaran berbasis poin untuk evaluasi perilaku siswa yang objektif.</p>
        </div>
      </div>

      <div class="feature">
        <div class="icon"><i class="bi bi-file-earmark-text-fill"></i></div>
        <div>
          <h5>Laporan & Cetak PDF</h5>
          <p>Generate laporan per siswa/kelas, siap untuk dicetak atau dikirim via email.</p>
        </div>
      </div>

      <div class="feature">
        <div class="icon"><i class="bi bi-phone-fill"></i></div>
        <div>
          <h5>Responsive Design</h5>
          <p>Tampilan optimal di desktop, tablet, dan smartphone.</p>
        </div>
      </div>

      <div class="feature">
        <div class="icon"><i class="bi bi-cloud-upload-fill"></i></div>
        <div>
          <h5>Upload Dokumen</h5>
          <p>Simpan foto siswa dan sertifikat dengan manajemen file yang rapi.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- STATS & CONTACT -->
  <section class="stats container" id="kontak">
    <div class="row g-4 align-items-stretch">
      <div class="col-md-8">
        <div class="stats-grid">
          <div class="stat">
            <div class="num">1.250+</div>
            <div class="label">Siswa Terdaftar</div>
          </div>
          <div class="stat">
            <div class="num">980</div>
            <div class="label">Prestasi Terdokumentasi</div>
          </div>
          <div class="stat">
            <div class="num">3.420</div>
            <div class="label">Poin Pelanggaran</div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card p-3">
          <h5 style="font-weight:800;">Hubungi Kami</h5>
          <p class="text-muted mb-2">Butuh demo atau bantuan integrasi?</p>
          <p class="mb-1"><i class="bi bi-geo-alt-fill me-2"></i>Jl. Pendidikan No. 123</p>
          <p class="mb-1"><i class="bi bi-telephone-fill me-2"></i>(021) 1234-5678</p>
          <p class="mb-0"><i class="bi bi-envelope-fill me-2"></i>info@smasazzainiyyah.sch.id</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <div class="container">
      <div class="row py-4">
        <div class="col-md-4">
          <h5 style="font-weight:800; color:#fff;">SMAS Azzainiyyah</h5>
          <p style="color:rgba(255,255,255,0.85);">MoniSwa — Sistem Informasi Monitoring Prestasi & Pelanggaran untuk meningkatkan kualitas pendidikan dan karakter siswa.</p>
        </div>

        <div class="col-md-4">
          <h6 style="font-weight:800; color:#fff;">Menu</h6>
          <ul style="list-style:none; padding:0; margin:0;">
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#tentang">Tentang</a></li>
            <li><a href="#fitur">Fitur</a></li>
            <li><a href="#kontak">Kontak</a></li>
          </ul>
        </div>

        <div class="col-md-4">
          <h6 style="font-weight:800; color:#fff;">Social Media</h6>
          <div class="d-flex gap-3">
            <a href="#" style="color:#fff;"><i class="bi bi-facebook" style="font-size:1.4rem;"></i></a>
            <a href="#" style="color:#fff;"><i class="bi bi-instagram" style="font-size:1.4rem;"></i></a>
            <a href="#" style="color:#fff;"><i class="bi bi-youtube" style="font-size:1.4rem;"></i></a>
            <a href="#" style="color:#fff;"><i class="bi bi-envelope" style="font-size:1.4rem;"></i></a>
          </div>
        </div>
      </div>

      <hr style="border-color: rgba(255,255,255,0.08);">
      <div class="text-center pb-3" style="color:rgba(255,255,255,0.8);">
        &copy; {{ date('Y') }} SMAS Azzainiyyah. All rights reserved.
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Smooth scroll + navbar shadow on scroll -->
  <script>
    // Smooth internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e){
        const href = this.getAttribute('href');
        if (!href || href === '#' || href.startsWith('http')) return;
        e.preventDefault();
        const el = document.querySelector(href);
        if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
      });
    });

    // Navbar shadow on scroll
    window.addEventListener('scroll', () => {
      const nav = document.querySelector('.site-nav');
      if (window.scrollY > 40) nav.style.boxShadow = '0 12px 36px rgba(16,24,40,0.12)';
      else nav.style.boxShadow = '0 8px 28px rgba(16,24,40,0.08)';
    });
  </script>
</body>
</html>